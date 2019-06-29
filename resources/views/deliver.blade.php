@extends('layouts.app')

@section('content')

<div class="container">

<!-- 
addr from
addr to
To Time / Date
Type of goods
Type of transp
Weight
paid
 -->

<?php 
if(isset($_GET['activate']))
{
	//$ = $_GET[''];

	$from_country = $_GET['from_country'];
	$from_city = $_GET['from_city'];
	$from_street = $_GET['from_street'];
	$from_house = $_GET['from_house'];
	$from_flat = $_GET['from_flat'];

	$to_country = $_GET['to_country'];
	$to_city = $_GET['to_city'];
	$to_street = $_GET['to_street'];
	$to_house = $_GET['to_house'];
	$to_flat = $_GET['to_flat'];

	$time = $_GET['time'];
	$date = $_GET['date'];
	$tog = $_GET['tog'];
	$tot = $_GET['tot'];
	$weight = $_GET['weight'];
	$paid = $_GET['paid'];

	// echo $from_country . "\n";
	// echo $from_city . "\n";
	// echo $from_street . "\n";
	// echo $from_house . "\n";
	// echo $from_flat . "\n";

	// echo $to_country . "\n";
	// echo $to_city . "\n";
	// echo $to_street . "\n";
	// echo $to_house . "\n";
	// echo $to_flat . "\n";

	// echo $time . "\n";
	// echo $date . "\n";
	// echo $tog . "\n";
	// echo $tot . "\n";
	// echo $weight . "\n";
	// echo $paid . "\n";

//echo 'INSERT INTO `order` (`addr_from_country`, `addr_from_city`, `addr_from_street`, `addr_from_house`, `addr_from_flat`, `addr_to_country`, `addr_to_city`, `addr_to_street`, `addr_to_house`, `addr_to_flat`, `to_date_time`, `type_goods`, `type_transp`, `weight`, `paid`) values ("' . $from_country .'","' . $from_city .'","' . $from_street .'","' . $from_house .'","' . $from_flat .'","' . $to_country .'","' . $to_city .'","' . $to_street .'","' . $to_house .'","' . $to_flat .'","' . $date . ' ' . $time . ':00' .'","' . $tog .'","' . $tot .'",' . $weight .',' . $paid .')';

	DB::insert('INSERT INTO `order` (`addr_from_country`, `addr_from_city`, `addr_from_street`, `addr_from_house`, `addr_from_flat`, `addr_to_country`, `addr_to_city`, `addr_to_street`, `addr_to_house`, `addr_to_flat`, `to_date_time`, `type_goods`, `type_transp`, `weight`, `paid`, `id_customer`, `status`, `code_executor`, `code_customer`) values ("' . $from_country .'","' . $from_city .'","' . $from_street .'","' . $from_house .'","' . $from_flat .'","' . $to_country .'","' . $to_city .'","' . $to_street .'","' . $to_house .'","' . $to_flat .'","' . $date . ' ' . $time . ':00' .'","' . $tog .'","' . $tot .'",' . $weight .',' . $paid . ',"' . Auth::user()->id . '", 4, "0", "0")');

	// INSERT INTO `order`(`addr_from_country`, `addr_from_city`, `addr_from_street`, `addr_from_house`, `addr_from_flat`, `addr_to_country`, `addr_to_city`, `addr_to_street`, `addr_to_house`, `addr_to_flat`, `to_date_time`, `type_goods`, `type_transp`, `weight`, `paid`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20])

	$m_shop = '288460879';
	$m_orderid = rand(11, 99999);
	$m_amount = number_format($paid, 2, '.', '');
	$m_curr = 'USD';
	$m_desc = base64_encode('Pay ' . $m_orderid);
	$m_key = 'Ваш секретный ключ';

	$arHash = array(
		$m_shop,
		$m_orderid,
		$m_amount,
		$m_curr,
		$m_desc
	);

	$arHash[] = $m_key;

	$sign = strtoupper(hash('sha256', implode(':', $arHash)));

	$postdata = http_build_query(
	    array(
	        'm_shop' => $m_shop,
	        'm_orderid' => $m_orderid,
	        'm_amount' => $m_amount,
	        'm_curr' => $m_curr,
	        'm_desc' => $m_desc,
	        'm_sign' => $m_sign,
	        'm_process' => 'send'
	    )
	);

	$opts = array('http' =>
	    array(
	        'method'  => 'POST',
	        'header'  => 'Content-type: application/x-www-form-urlencoded',
	        'content' => $postdata
	    )
	);

	$context  = stream_context_create($opts);

	$result = file_get_contents('https://payeer.com/merchant/', false, $context);

}
?>

<form action="<?php echo URL::current(); ?>">
<input type="hidden" name="activate" value="on">
	<div class="form-group">
		<label for="exampleInputEmail1">Addres from</label>
		<div class="row">
			<div class="col-md-6"><input type="text" name="from_country" autocomplete="off" class="form-control" placeholder="Country"></div>
			<div class="col-md-6"><input type="text" name="from_city" class="form-control" placeholder="City"></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4"><input type="text" name="from_street" class="form-control" placeholder="Street"></div>
			<div class="col-md-4"><input type="text" name="from_house" class="form-control" placeholder="House"></div>
			<div class="col-md-4"><input type="text" name="from_flat" class="form-control" placeholder="Flat"></div>
		</div>
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Addres to</label>
		<div class="row">
			<div class="col-md-6"><input type="text" name="to_country" class="form-control" placeholder="Country"></div>
			<div class="col-md-6"><input type="text" name="to_city" class="form-control" placeholder="City"></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4"><input type="text" name="to_street" class="form-control" placeholder="Street"></div>
			<div class="col-md-4"><input type="text" name="to_house" class="form-control" placeholder="House"></div>
			<div class="col-md-4"><input type="text" name="to_flat" class="form-control" placeholder="Flat"></div>
		</div>
	</div>
	<div class="form-group">
		<label for="exampleInputFile">To Time and Date</label>
		<div class="row">
			<div class="col-md-6"><input type="time" name="time" class="form-control" placeholder="Time"></div>
			<div class="col-md-6"><input type="date" name="date" class="form-control" placeholder="Date"></div>
		</div>
	</div>
	<div class="form-group">
		<label for="exampleInputFile">Type of goods</label>
		<select class="form-control" name="tog">
		  <option value="Food">Food</option>
		  <option value="Pet">Pet</option>
		  <option value="Fragile object">Fragile object</option>
		  <option value="Any object">Any object</option>
		</select>
	</div>
	<div class="form-group">
		<label for="exampleInputFile">Type of transp</label>
		<select class="form-control" name="tot">
		  <option value="Train">Train</option>
		  <option value="Car">Car</option>
		  <option value="Airplane">Airplane</option>
		  <option value="Any type">Any type</option>
		</select>
	</div>
	<div class="form-group">
		<label for="exampleInputFile">Weight (in kg)</label>
		<input type="text" class="form-control" name="weight" placeholder="0.5">
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputFile">Paid (in $)</label>
				<input type="number" class="form-control" name="paid" placeholder="5" id="by_paid" onchange="paidcalculate()">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputFile">Will get the performer (in $)</label>
				<input type="number" class="form-control" name="paid" placeholder="4" id="to_paid" disabled>
			</div>
		</div>
	</div>
	
	
  <button type="submit" class="btn btn-success btn-lg">Submit</button>
</form>
<br>

</div>

@endsection