@extends('layouts.app')

@section('content')

<div class="container">

<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <a type="button" class="btn btn-default" href="/topcustomers?top=10">Top 10</a>
  </div>
  <div class="btn-group" role="group">
    <a type="button" class="btn btn-default" href="/topcustomers?top=20">Top 20</a>
  </div>
  <div class="btn-group" role="group">
    <a type="button" class="btn btn-default" href="/topcustomers?top=30">Top 30</a>
  </div>
</div>
<br>
<table class="table">
<thead> 
	<tr> 
		<th>User ID</th> 
		<th>Overall Rating</th>
		<th></th>
	</tr> 
</thead> 
<tbody> 
<!-- 	<tr> 
		<th scope="row">1</th> 
		<td>Mark</td> 
		<td>Otto</td> 
		<td>@mdo</td> 
	</tr> 

	<tr> 
		<th scope="row">2</th> 
		<td>Jacob</td> 
		<td>Thornton</td> 
		<td>@fat</td> 
	</tr> 

	<tr> 
		<th scope="row">3</th> 
		<td>Larry</td> 
		<td>the Bird</td> 
		<td>@twitter</td> 
	</tr>  -->


<?php 
// $backid = 0;
// $rate = 0;
// foreach ($comm as $com) {
// 	if ($com->to_u != $backid) {
// 		echo "
// 		<tr> 
// 			<th scope='row'>" . $com->to_u . "</th>
// 			<td>" . $rate . "</td> 
// 		</tr> 
// 		";
// 		$rate = 0;
// 	}
// 	else {
// 		$rate = ($rate + $com->rate)/2;
// 	}
// 	$backid = $com->to_u;
// 	// echo "
// 	// <tr> 
// 	// 	<th scope='row'>" . $com->id . "</th> 
// 	// 	<td>" . $com->to_u . "</td> 
// 	// 	<td>" . $com->rate . "</td> 
// 	// </tr> 
// 	// ";
// 	//SELECT AVG(`rate`) FROM `comments` WHERE `to_u` = 1
// 	//SELECT `to_u`, count(`to_u`) FROM `comments` WHERE `type_u` = 1 GROUP BY `to_u` ORDER BY count(`to_u`) desc
// }

$mysqli = new mysqli("localhost", "kudinovnikita", "ho23me3478", "kudinovnikita_del");
$result = $mysqli->query("SELECT `to_u`, SUM(`rate`) FROM `comments` WHERE `type_u` = 2 GROUP BY `to_u` ORDER BY SUM(`rate`) desc LIMIT " . $_GET['top']);
while( $row = $result -> fetch_row() )
{
	echo "
		<tr> 
		<th scope='row'>" . $row[0] . "</th> 
		<td>" . $row[1] . "</td>
		</tr>";
	
}

// запрос "SELECT `to_u`, count(`to_u`) FROM `comments` GROUP BY `to_u` ORDER BY count(`to_u`) desc" // надо ещё тут лимит добавить
// из него мы выбираем 0 строку и делаем запрос "SELECT AVG(`rate`) FROM `comments` WHERE `to_u` = [0]"

?>
</tbody> 
</table>

</div>

@endsection