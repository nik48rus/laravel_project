@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
	<div class="col-md-4">
		<div class="list-group">
			<!-- <button type="button" class="list-group-item" onclick="selectyet('kras')">kras</button>
			<button type="button" class="list-group-item" onclick="selectyet('morder')">morder</button>
			<button type="button" class="list-group-item" onclick="selectyet('keysi')">keysi</button>
			<button type="button" class="list-group-item" onclick="selectyet('marta')">marta</button> -->
			<?php 

			foreach ($orders as $ord) {
				// $ord->id
				foreach ($choice as $cho) {
					if($ord->id == $cho->id_order & ($cho->id_order == $_GET['id']))
					{
						$user = DB::table('users')->where('id', $cho->id_executor)->first();

						echo '<button type="button" class="list-group-item" onclick="selectyet(`' . $user->name . '`)">' . $user->name . '</button>';
					}
				}
			    	
			}

			?>
		</div>
	</div>
	<div class="col-md-8">
		<div class="selecteding"></div>
		<br>
		<div class="row">
			<div class="col-md-6"><button type="button" class="btn btn-info btn-lg" style="width: 100%;" disabled>Info</button></div>
			<div class="col-md-6"><button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target=".bs-example-modal-sm" style="width: 100%;" disabled>Select</button></div>
		</div>

		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		  <div class="modal-dialog modal-sm" role="document">
		    		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="exampleModalLabel">Are you sure?</h4>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
		        <button id="retmet" type="button" class="btn btn-success">Yes</button>
		      </div>
		    </div>
		  </div>
		</div>


	</div>
</div>
	
</div>

@endsection