@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Profile <a href="/myorders" style="float: right; margin-top: -7px;" type="button" class="btn btn-info">My orders</a></div>

				<!--<div class="panel-body">
					You are logged in!
				</div>-->
<!--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>-->
<div class="row">
  <div class="col-md-2">
	  <?php 
	  //https://www.gravatar.com/avatar/d5e109f1c99700e5fd0beff00e38b78c?d=https%3A%2F%2Fwww.somewhere.com%2Fhomestar.jpg&s=200

	  //https://www.gravatar.com/avatar/c496c4a1a2039a5328611b1bf98428ff?d=https%3A%2F%2Fwww.somewhere.com%2Fhomestar.jpg&s=200
	$email = Auth::user()->email;
	$default = "http://leadsystemnetwork.com/wp/peter935/wp-content/uploads/sites/1509/2014/10/Gravatar-icon.png";
	$size = 200;
	$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
   //echo $grav_url;
	echo '<img class="avatar" src="' . $grav_url . '" style="border-radius: 50%;">'
   ?>
  </div>
  <div class="col-md-10"><h1 style="text-align: center; line-height: 200px;">{{ Auth::user()->name }}</h1></div>
  <!--<div class="col-md-2">
	<fieldset class="starability-fade">
	  <input type="radio" id="first-rate5" name="rating" value="5" />
	  <label for="first-rate5" title="Amazing">5 stars</label>
	  <input type="radio" id="first-rate4" name="rating" value="4" />
	  <label for="first-rate4" title="Very good">4 stars</label>
	  <input type="radio" id="first-rate3" name="rating" value="3" />
	  <label for="first-rate3" title="Average">3 stars</label>
	  <input type="radio" id="first-rate2" name="rating" value="2" />
	  <label for="first-rate2" title="Not good">2 stars</label>
	  <input type="radio" id="first-rate1" name="rating" value="1" />
	  <label for="first-rate1" title="Terrible">1 star</label>
	</fieldset>

  </div>-->



</div>
<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="float: right; margin-right: 10px;">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	<form action="home/save" method="get">
	  <div class="modal-header" style="background-color: #3097d1; color: white;">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Information</h4>
	  </div>
	  <div class="modal-body">
		<input type="hidden" name="id" value="{{ Auth::user()->id }}">
		<div class="form-group">
			<label for="exampleInputEmail1">Age</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="23" name="age">
		</div>
		<div class="form-group">
			<label for="payeer">Payeer wallet <small><a href="">What?</a></small></label>
			<input type="text" class="form-control" id="payeer" placeholder="PXXXXXXXX" name="payeer">
		</div>
		<h3><label for="exampleInputPassword1">Location</label></h3>
		<blockquote>
		<div class="form-group">
			<label for="exampleInputPassword1">Country</label>
			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Россия" name="addr_co">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">City</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Москва" name="addr_ci">
		</div>
		</blockquote>
		
	  </div>
	  <div class="modal-footer">
		<!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
		<button type="submit" class="btn btn-primary">Save</button>
	  </div>
	  </form>
	</div>
  </div>
</div>

<div style="width: 100%; height: 10px; float: left;"></div>

<div class="row">
  <div class="col-md-4">
	<div class="panel panel-info" style="border-radius: 0px;">
	  <div class="panel-heading" style="border-radius: 0px;">
		<h3 class="panel-title">Age</h3>
	  </div>
	  <div class="panel-body">
		{{ Auth::user()->user_age }}
	  </div>
	</div>
  </div>
  <div class="col-md-4">
	<div class="panel panel-info" style="border-radius: 0px;">
	  <div class="panel-heading" style="border-radius: 0px;">
		<h3 class="panel-title">Location</h3>
	  </div>
	  <div class="panel-body">
		{{ Auth::user()->addr_country }}, {{ Auth::user()->addr_city }}
	  </div>
	</div>
  </div>
  <div class="col-md-4">
	<div class="panel panel-info" style="border-radius: 0px;">
	  <div class="panel-heading" style="border-radius: 0px;">
		<h3 class="panel-title">Wallet</h3>
	  </div>
	  <div class="panel-body">
		{{ Auth::user()->payeer }}
	  </div>
	</div>
  </div>
</div>
	

<!-- Modal 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Изменить аватарку</h4>
	  </div>
	  <form method="post" action="./upload.php" enctype="multipart/form-data">
	  <div class="modal-body">
		<p>Чтобы изменить аватарку выберите файл в поле ниже</p>
		
		  <div class="form-group">
			<input type="file" id="exampleInputFile">
			<p class="help-block">Не более 3 Мб.</p>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
		<button type="submit" class="btn btn-primary">Сохранить изменения</button>
	  </div>
	  </form>
	</div>
  </div>
</div>-->
			</div>
		</div>
	</div>
</div>

<div class="split"></div>

<br>

<div class="container">
	<!--<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
		  <div class="panel-heading">Alex <span style="float: right;"><script type="text/javascript">for(var i = 0; i < 5; i++){document.write("<img style='margin-top: -5px; height: 20px;' src='img/star_in.png'>");}</script></span></div>
		  <div class="panel-body">
			Good Job!
		  </div>
		</div>
	</div>-->

<?php 

foreach ($comm as $comms) {
	//echo $user->name;
	if( Auth::user()->id == $comms->to_u)
	{
		echo '<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
			  <div class="panel-heading">' . $comms->by_u;
		if($comms->type_u == 1)
		{
			echo " <i style='opacity: .7;'>Customer</i>";
		}
		if($comms->type_u == 2) 
		{
			echo " <i style='opacity: .7;'>Executor</i>";
		}
		echo '<span style="float: right;"><script type="text/javascript">for(var i = 0; i < ' . $comms->rate . '; i++){document.write("<img src=img/star_in.png>");}</script></span></div>
			  <div class="panel-body">
				' . $comms->text . '
			  </div>
			</div>
		</div>';
	}
	
}

?>

</div>



@endsection
