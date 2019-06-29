<?php 

// проверка на существование кода исполнителя
// -> проверка на правильность кода получателя
// --> поставить статус на "исполнено"
// --> ? перевести исполнителю на кошелёк деньги ?
// --> оповестить исполнителя и заказчика по email о взаимном отзыве
// --> вывести "succ"
// --x вывести "err"
// -x вывести "err"

$mysqli = new mysqli("localhost", "root", "", "lara");
$result = $mysqli->query("SELECT * FROM `order` WHERE `code_executor` = " . $_GET['code_exe']);
$payeer = "";

function mail($tomail, $subject, $message)
{
	$message = wordwrap($message, 70, "\r\n"); // На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	mail($email, $subject, $message, $headers);
}

if ($result == 1){
	while( $row = $result -> fetch_row() )
	{
		$cost = $row[17];
		$zak_id = $row[0];
		$cust_id = $row[18];
		$exec_code = $row[20];
		$cust_code = $row[21];
	}
	if($exec_code == $_GET['code_exe'] & $cust_code == $_GET['code_cust'])
	{
		$sql = "UPDATE `order` SET `status` = 1 WHERE `code_executor` = " . $_GET['code_exe'];

		if ($mysqli->query($sql) === TRUE) { /*echo "Record updated successfully";*/ } else { echo "err"; }

		$useroff = $mysqli->query("SELECT * FROM `users` WHERE `id` = " . $cust_id);
		while( $row = $useroff -> fetch_row() )
		{
			$email_usere = $row[2];
			$payeer = $row[4];
		}
		$useron = $mysqli->query("SELECT * FROM `choice` WHERE `id_customer` = " . $cust_id);
		while( $row = $useron -> fetch_row() )
		{
			$exe_usere = $row[2];
		}
		$userspin = $mysqli->query("SELECT * FROM `choice` WHERE `id_customer` = " . $exe_usere);
		while( $row = $userspin -> fetch_row() )
		{
			$exe_email = $row[2];
		}

		$url_to = 'http://laradel.lar/comm?type=1&id_user='.$cust_id.'&id_order='.$zak_id;
		mail($email_usere, 'Successfully', '<html><head><title></title></head><body> You have confirmed the order, in order to complete the delivery of the order, you need to provide feedback. <br> <a href="' . $url_to . '">Link</a> </body></html>');

		$url_frm = 'http://laradel.lar/comm?type=2&id_user='.$exe_usere.'&id_order='.$zak_id;
		mail($exe_email, 'Successfully', '<html><head><title></title></head><body> You have confirmed the order, in order to complete the delivery of the order, you need to provide feedback. <br> <a href="' . $url_frm . '">Link</a> </body></html>');

		$cost = intval($cost) * 0.8;

		// --- перевод денег ---

		require_once('cpayeer.php');
		$accountNumber = 'P11589341';
		$apiId = '288458745';
		$apiKey = 'e918df2a8d9b9c27cf2e8d05ec36820c';
		$payeer = new CPayeer($accountNumber, $apiId, $apiKey);
		if ($payeer->isAuth())
		{
			$arTransfer = $payeer->transfer(array(
				'curIn' => 'USD',
				'sum' => $cost,
				'curOut' => 'USD',
				'to' => $payeer,	
				'comment' => 'Pay to deliver service'
			));
			if (empty($arTransfer['errors']))
			{
				echo $arTransfer['historyId'].": Good!";
			}
			else
			{
				echo '<pre>'.print_r($arTransfer["errors"], true).'</pre>';
			}
		}
		else
		{
			echo '<pre>'.print_r($payeer->getErrors(), true).'</pre>';
		}

		// <-> перевод денег <->

		echo $cost;
	}
	else{
		echo "err";
	}
}

?>