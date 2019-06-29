<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Confirm</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/conf.css') }}"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php 
if (isset($_GET['activ'])) {
	$code1 = $_GET['code_isp'];
	$code2 = $_GET['code_zak'];
	// echo $code1 . '<br>';
	// echo $code2;
	echo "<script>window.onload = function () {
		$('#step1').attr('class', 'hide');
		$('#succ').attr('class', '');
	}</script>";

	$.ajax({
		url: "{{ asset('scripts/codereq.php') }}?code_exe=<? if (isset($_GET['activ'])) {echo $_GET['code_isp'];} ?>&code_cust=<? if (isset($_GET['activ'])) {echo $_GET['code_zak'];} ?>",
		success: function(data){
			if(data != 'err')
			{
				$('.price-end').text('$' + data);
			}
		}
	});
}
?>
<div class="box">
	<form action="" id="step1">
		<input type="hidden" name="activ" value="1">
		<div style="text-align: center;">
			<label for="inp_your_code" class="pre-inputing">Код исполнителя:</label><br>
			<div class="h"></div>
			<input type="text" id="inp_your_code" name="code_isp" class="inputing" placeholder="#####" maxlength="5" required>
		</div>
		<div class="h"></div>
		<div class="h"></div>
		<div style="text-align: center;">
			<label for="inp_your_ocode" class="pre-inputing">Код заказчика:</label><br>
			<div class="h"></div>
			<input type="text" id="inp_your_ocode" name="code_zak" class="inputing" placeholder="#####" maxlength="5" required>
		</div>
		<div class="h"></div>
		<div class="h"></div>
		<div class="h"></div>
		<div class="h"></div>
		<div>
			<center> <input type="submit" value="Готово" class="nexted"> </center>
		</div>
	</form>
	<div id="succ" class="hide">
		<p class="center f30">Всё прошло успешно</p>
		<div class="h"></div>
		<div class="h"></div>
		<div class="mini-box">
			<p class="f22">Код исполнителя: <span><? if (isset($_GET['activ'])) {echo $_GET['code_isp'];} ?></span></p>
			<p class="f22">Код заказчика: <span><? if (isset($_GET['activ'])) {echo $_GET['code_zak'];} ?></span></p>
		</div>
		<div class="h"></div>
		<div class="h"></div>
		<center><div class="price-end f30">$18</div></center>
	</div>
</div>

</body>
</html>