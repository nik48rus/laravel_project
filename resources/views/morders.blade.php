@extends('layouts.app')

@section('content')

<div class="container">
<div class="well">
	<button type="button" class="btn btn-default" disabled="disabled">Normal</button>
	<button type="button" class="btn btn-success" disabled="disabled">Success</button>
	<button type="button" class="btn btn-danger" disabled="disabled">Error</button>
	<p style="display: inline; float: right; line-height: 270%;">On <button type="button" class="btn btn-danger" disabled="disabled">Error</button>, send your message on [support email]</p>
</div>
<div class="row">
	<div class="col-md-6"><div class="panel panel-default" style="background-color: white; width: 100%;">
		<div class="panel-heading">
			<h3 class="panel-title">Активные заказы</h3>
		</div>
		<div class="panel-body">
		<table class="table table-hover"> 
			<thead> 
				<tr> 
					<th>Дата / Время до</th> 
					<th>Кол-во кандидатов</th> 
					<th></th>
				</tr> 
			</thead> 

			<tbody> 
				<!-- <tr> 
					<td>Mark</td> 
					<td>Otto</td> 
					<td><button type="button" class="btn btn-warning btn-xs">info</button></td>
				</tr> 

				<tr> 
					<td>Jacob</td> 
					<td>Thornton</td> 
					<td><button type="button" class="btn btn-warning btn-xs">info</button></td>
				</tr> 

				<tr> 
					<td>Larry</td> 
					<td>the Bird</td> 
					<td><button type="button" class="btn btn-warning btn-xs">info</button></td>
				</tr>  -->
<?php 

foreach ($orders as $ord) {
	$nume = 0;
	if($ord->id_customer == Auth::user()->id & ($ord->status == 0 | $ord->status == 2 | $ord->status == 3))
	{
		if($ord->status == 2){
			echo '<tr class="danger">';
		}
		if($ord->status == 3)
		{
			echo '<tr class="warning">';
		}
		else {
			echo '<tr>';
		}
		echo '<td>' . date_format(date_create($ord->to_date_time), 'H:i / d.m.Y') . '</td>';
		foreach ($choice as $cho) {
			if($cho->id_customer == Auth::user()->id & $ord->id == $cho->id_order)
			{
				$nume = $nume + 1;
			}
		}
		echo '<td>' . $nume . '</td>';
		$nume = 0;
		if($ord->status == 3)
		{
			echo '<td><button type="button" class="btn btn-info btn-xs" onclick="" >about</button></td>';
		}
		else
		{
			echo '<td><button type="button" class="btn btn-info btn-xs" onclick="inform(' . $ord->id . ')" >info</button></td>';
		}
		echo '</tr>';
	}
    	
}

?>
			</tbody> 
		</table>
		</div>
	</div></div>
	<div class="col-md-6"><div class="panel panel-default" style="background-color: white; width: 100%;">
		<div class="panel-heading">
			<h3 class="panel-title">Готовые заказы</h3>
		</div>
		<div class="panel-body">
		<table class="table table-hover"> 
			<thead> 
				<tr> 
					<th>Дата / Время до</th> 
					<th>Кол-во кандидатов</th> 
					<th></th>
				</tr> 
			</thead> 

			<tbody> 
				<!-- <tr> 
					<td>Mark</td> 
					<td>Otto</td> 
					<td><button type="button" class="btn btn-info btn-xs">info</button></td>
				</tr> 

				<tr> 
					<td>Jacob</td> 
					<td>Thornton</td> 
					<td><button type="button" class="btn btn-info btn-xs">info</button></td>
				</tr> 

				<tr> 
					<td>Larry</td> 
					<td>the Bird</td> 
					<td><button type="button" class="btn btn-info btn-xs">info</button></td>
				</tr>  -->
<?php 

foreach ($orders as $ord) {
	$nume = 0;
	if($ord->id_customer == Auth::user()->id & $ord->status == 1)
	{
		echo '<tr class="success">';
		echo '<td>' . date_format(date_create($ord->to_date_time), 'H:i / d.m.Y') . '</td>';
		foreach ($choice as $cho) {
			if($cho->id_customer == Auth::user()->id & $ord->id == $cho->id_order)
			{
				$nume = $nume + 1;
			}
		}
		echo '<td>' . $nume . '</td>';
		$nume = 0;
		echo '<td><button type="button" class="btn btn-warning btn-xs">Оставить отзыв</button></td>';
		echo '</tr>';
	}
    	
}

?>
			</tbody> 
		</table>
		</div>
	</div></div>
</div>	
</div>

@endsection