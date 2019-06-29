@extends('layouts.app')

@section('content')


<?php 

$mysqli = new mysqli("localhost", "root", "", "lara");
$access_one = 0;
$access_two = 0;
$yter = 0;

function erroes()
{
	echo "errr";
	echo "<script> window.location.href = '/home'; </script>";
}

if($_GET['id_user'] == Auth::user()->id)
{
	if($_GET['type'] == 1)
	{
		$result = $mysqli->query("SELECT * FROM `order` WHERE `id_customer` = '" . $_GET['id_user'] . "'");

		while( $row = $result -> fetch_row() )
		{
			if($row[0] == $_GET['id_order'])
			{
				$access_one = 1;
				break;
			}
			else{
				$access_one = 0;
			}
		}
	}

	if($_GET['type'] == 2)
	{
		$result = $mysqli->query("SELECT * FROM `choice` WHERE `id_customer`= " . $_GET['id_user']);

		while( $row = $result -> fetch_row() )
		{
			if($row[1] == $_GET['id_order'])
			{
				$access_one = 1;
				break;
			}
			else{
				$access_one = 0;
			}
		}
	}

	$fro = $mysqli->query("SELECT * FROM `order` WHERE `id` = " . $_GET['id_order']);

	while( $row = $fro -> fetch_row() )
	{
		if($row[19] != 0)
		{
			$access_two = 1;
			break;
		}
		else{
			$access_two = 0;
		}
	}
	if($access_one == 1 & $access_two == 1)
	{
		if(isset($_GET['activate']))
		{
			$tusr = $mysqli->query("SELECT * FROM `choice` WHERE `id_order` = " . $_GET['id_order'] . " AND `id_customer` =  " . $_GET['id_user']);
			while( $row = $tusr -> fetch_row() )
			{
				$yter = $row[2];
			}

			$ins = "INSERT INTO `comments`(`to_u`, `by_u`, `text`, `rate`, `type_u`) VALUES (" . $yter . ",'" . $_GET['id_user'] . "','" . $_GET['text'] . "'," . $_GET['rate'] . "," . $_GET['type'] . ")";
			
			if ($mysqli->query($ins) === TRUE) {
			    // echo "Record updated successfully";
			} else {
			    echo "Error in frst";
			}

			// UPDATE `order` SET `status` =  WHERE `id` = 

			$stata = "UPDATE `order` SET `status` = 0  WHERE `id` = " . $_GET['id_order'];
			
			if ($mysqli->query($stata) === TRUE) {
			    // echo "Record updated successfully";
			} else {
			    echo "Error in scnd";
			}
			echo "<script> window.location.href = '/home'; </script>";
		}
	}
	else{
		erroes();
	}
	// echo '<br>' . $access_one . '<br>';
	// echo $access_two;
}
else
{
	erroes();
}
?>

<div class="container">
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<h1>Leave a review</h1>
		<?php
		if(isset($_GET['type']))
		{ 
			if($_GET['type'] == 1)
			{
				echo "<p>Evaluate how the order was executed, whether everything was in order with him, how sooner or later it was brought.</p>"; 
			}
		}
		if(isset($_GET['type']) )
		{ 
			if($_GET['type'] == 2)
			{
				echo "<p>Appreciate the customer if he was polite with you.</p>"; 
			}
		} 
		?>
		
		
		<form action="">
			<textarea name="text" class="form-control" rows="5" style="resize:vertical;" required></textarea>
			<?php if(isset($_GET['type'])) { echo '<input name="type" type="hidden" value="' . $_GET['type'] . '">'; } ?>
			<br>
			<input type="hidden" name="activate" value="1">
			<input type="hidden" name="id_user" value="<? if(isset($_GET['id_user'])) { echo $_GET['id_user']; } ?>">
			<input type="hidden" name="id_order" value="<? if(isset($_GET['id_order'])) { echo $_GET['id_order']; } ?>">
			<div style="float: left;">
				<select class="form-control" name="rate">
					<option value="1">Worse than ever</option>
					<option value="2">Bad</option>
					<option value="3" selected>Normally</option>
					<option value="4">Good</option>
					<option value="5">Perfectly</option>
				</select>
			</div>
			<button type="submit" class="btn btn-default btn-lg" style="float: right;">SEND</button>
		</form>
	</div>
	<div class="col-md-2"></div>
</div>

</div>

@endsection