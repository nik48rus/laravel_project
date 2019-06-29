@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Профиль</div>


<div class="row">
  <div class="col-md-2">

  <?php 
      //https://www.gravatar.com/avatar/d5e109f1c99700e5fd0beff00e38b78c?d=https%3A%2F%2Fwww.somewhere.com%2Fhomestar.jpg&s=200

      //https://www.gravatar.com/avatar/c496c4a1a2039a5328611b1bf98428ff?d=https%3A%2F%2Fwww.somewhere.com%2Fhomestar.jpg&s=200
    $email = $user->email;
    $default = "http://leadsystemnetwork.com/wp/peter935/wp-content/uploads/sites/1509/2014/10/Gravatar-icon.png";
    $size = 200;
    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
   //echo $grav_url;
    echo '<img class="avatar-mini" src="' . $grav_url . '" style="border-radius: 50%;">'
   ?>

  </div>
  <div class="col-md-10"><h3 style="text-align: center; line-height: 50px;">{{ $user->name }}</h3></div>



</div>

<div style="width: 100%; height: 10px; float: left;"></div>

<div class="row">
  <div class="col-xs-6">
    <div class="panel panel-info" style="border-radius: 0px;">
      <div class="panel-heading" style="border-radius: 0px;">
        <h3 class="panel-title">Возраст</h3>
      </div>
      <div class="panel-body">
        {{ $user->user_age }}
      </div>
    </div>
  </div>
  <div class="col-xs-6">
    <div class="panel panel-info" style="border-radius: 0px;">
      <div class="panel-heading" style="border-radius: 0px;">
        <h3 class="panel-title">Место жительства</h3>
      </div>
      <div class="panel-body">
        {{ $user->addr_country }}, {{ $user->addr_area }} область, {{ $user->addr_city }}
      </div>
    </div>
  </div>
</div>
    
            </div>
        </div>
    </div>
</div>

<div class="split"></div>

<br>

<div class="container">

<?php 

foreach ($comm as $comms) {
    //echo $user->name;
    if( $user->id == $comms->to_u)
    {
        echo '<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
              <div class="panel-heading">' . $comms->by_u . '<span style="float: right;"><script type="text/javascript">for(var i = 0; i < ' . $comms->rate . '; i++){document.write("<img src=img/star_in.png>");}</script></span></div>
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
