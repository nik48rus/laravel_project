<?php 

$mysqli = new mysqli("localhost", "root", "", "lara");

// if(isset($_GET['o_id']) & isset($_GET['u_id']))
// {
// 	echo "succ";
// }

// o_id - order & u_id - user & c_id - customer

$orderID = $_GET['o_id'];
$userID = $_GET['u_id'];
$customerID = $_GET['c_id'];

$result = $mysqli->query("SELECT * FROM `choice` WHERE `id_order` = " . $orderID);
//$row = $result->fetch_row();
$rar = 1;

while( $row = $result -> fetch_row() )
{
	if ($row[2] == $userID) {
		echo "err";
		$rar = 0;
		break;
	}
}

if ($rar == 1) {
	$eer = $mysqli->query("INSERT INTO `choice`(`id_order`, `id_executor`, `id_customer`) VALUES (" . $orderID . "," . $userID . "," . $customerID . ")");
	if ($eer == 1) {
		echo "succ";
	}
	else {
		echo "err";
	}
}

/* TODO
+ проверить присланый id исполнителя по базе, если есть на этот заказ, респонсом отправить что "ваша заявка уже есть в списке на этот заказ"
+ если всё норм, то записать в базу все три свойства (передаются GET запросом) и отправить респонс об успешности
*/

$mysqli->close();

?>