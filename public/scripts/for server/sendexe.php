<?php 

$mysqli = new mysqli("localhost", "kudinovnikita", "ho23me3478", "kudinovnikita_del");
$result = $mysqli->query("SELECT * FROM `users` WHERE `name` = '" . $_GET['name'] . "'");
$order = $mysqli->query("SELECT * FROM `order` WHERE `id` = " . $_GET['id_order']);
$choice = $mysqli->query("SELECT * FROM `choice` WHERE `id_order` = " . $_GET['id_order']);

while( $row = $result -> fetch_row() )
{
	$id_exet = $row[0];
	$userName = $_GET['name']; // user name
	$email = $row[2]; // email
}

while( $row = $order -> fetch_row() )
{
	$id = $row[0];
	$from = $row[1] . $row[2] . $row[3] . $row[4] . $row[5];
	$to = $row[6] . $row[7] . $row[8] . $row[9] . $row[10];
	$datetime = $row[13];
	$tog = $row[14];
	$tot = $row[15];
	$weight = $row[16];
	$paid = $row[17];
	//$exe_code = $row[20];
}

$exe_code = rand(10000, 99999);
$cust_code = rand(10000, 99999);

// тема письма
$subject = 'You were chosen as the performer!';

// текст письма
$message = '
<html>
<head>
	<title></title>
	<style>
		*{
			font-family: "Arial";
		}
	</style>
</head>
<body>
	<h3>You were chosen as the performer!</h3>
	<table>
		<tr>
			<td><b>ID</b></td>
			<td>' . $id . '</td>
		</tr>
		<tr>
			<td><b>From</b></td>
			<td>' . $from . '</td>
		</tr>
		<tr>
			<td><b>To</b></td>
			<td>' . $to . '</td>
		</tr>
		<tr>
			<td><b>Before</b></td>
			<td>' . $datetime . '</td>
		</tr>
		<tr>
			<td><b>Type of goods</b></td>
			<td>' . $tog . '</td>
		</tr>
		<tr>
			<td><b>Type of transport</b></td>
			<td>' . $tot . '</td>
		</tr>
		<tr>
			<td><b>Weight</b></td>
			<td>' . $weight . '</td>
		</tr>
		<tr>
			<td><b>Paid</b></td>
			<td>' . $paid . '</td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td><b>Executor code</b></td>
			<td>' . $exe_code . '</td>
		</tr>
	</table>
</body>
</html>
';

// Для отправки HTML-письма должен быть установлен заголовок Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


// Отправляем
mail($email, $subject, $message, $headers);

// поставить статус заказа на "выполняется" (жёлтый цвет)
$sql = "UPDATE `order` SET `status` = 3, `code_executor` = " . $exe_code . ", `code_customer` = " . $cust_code . " WHERE `id` = " . $_GET['id_order'];

if ($mysqli->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
// почистить в базе choice исполнителей заказа (можно по id сделать), но кроме одного чела, ведь он выполняет заказ
while( $row = $choice -> fetch_row() )
{
	// $id = $row[0];
	if($row[2] != $id_exet)
	{
		$sql = "DELETE FROM `choice` WHERE `id_order` = " . $_GET['id_order'] . " AND `id_executor` = " . $row[2];

		if ($mysqli->query($sql) === TRUE) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . $conn->error;
		}
	}
}

header('Location: /myorders');

// по кнопке about открывать modal с инфой о заказе и инфой об исполнителе 

?>