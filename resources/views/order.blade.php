@extends('layouts.app')

@section('content')

<div class="container">
	<div class="srch">
		<form class="p15" action="<?php echo URL::current(); ?>" method="get">
		  	<div class="row">
			  <div class="col-md-6">
				  <div class="form-group">
					<div>Search by addres from</div>
					<input type="text" class="form-control" name="fromaddr" placeholder="Moscow" <?php if(isset($_GET['fromaddr'])){ echo 'value = "' . $_GET['fromaddr'] . '"'; } ?>>
				  </div>
			  </div>
			  <div class="col-md-6">
			  	  <div class="form-group">
					<div>Search by addres to</div>
					<input type="text" class="form-control" name="toaddr" placeholder="Voronesh" <?php if(isset($_GET['toaddr'])){ echo 'value = "' . $_GET['toaddr'] . '"'; } ?>>
				  </div>
			  </div>
			</div>

			<div class="row">
				<div class="col-md-6"><!-- Type of goods -->
					<div class="form-group">
						<div>Search by type of goods</div>
						<select name="tog">
						    <option value="Food" <? if(isset($_GET['tog'])){if($_GET['tog'] == "Food"){echo "selected";}} ?> >Food</option>
						    <option value="Pet" <? if(isset($_GET['tog'])){if($_GET['tog'] == "Pet"){echo "selected";}} ?> >Pet</option>
						    <option value="Fragile object" <? if(isset($_GET['tog'])){if($_GET['tog'] == "Fragile object"){echo "selected";}} ?> >Fragile object</option>
						    <option value="Any objects" <? if(isset($_GET['tog'])){if($_GET['tog'] == "Any objects"){echo "selected";}} ?> >Any objects</option>
						</select>
					</div>
				</div>
				<div class="col-md-6"><!-- Type of transp -->
					<div class="form-group">
						<div>Search by type of transport</div>
						<select name="tot">
							<option value="Train" <? if(isset($_GET['tot'])){if($_GET['tot'] == "Train"){echo "selected";}} ?> >Train</option>
						    <option value="Car" <? if(isset($_GET['tot'])){if($_GET['tot'] == "Car"){echo "selected";}} ?> >Car</option>
						    <option value="Airplane" <? if(isset($_GET['tot'])){if($_GET['tot'] == "Airplane"){echo "selected";}} ?> >Airplane</option>
						    <option value="Any type" <? if(isset($_GET['tot'])){if($_GET['tot'] == "Any type"){echo "selected";}} ?> >Any type</option>
						</select>
					</div>
				</div>
				<!-- <div class="col-md-4"></div> -->
			</div>

		  <div class="checkbox">
		    
		    <!-- <label><input type="checkbox" name="obl" <?php if(isset($_GET['obl'])){ echo 'checked'; } ?> > Не отображать область</label> <br> -->
		    <label><input type="checkbox" name="date" <?php if(isset($_GET['date'])){ echo 'checked'; } ?> > Do not show today's date</label>
		    <input type="hidden" name="stra" value="<?php if(isset($_GET['stra'])){echo $_GET['stra'];} ?>">
		    <input type="hidden" name="city" value="<?php if(isset($_GET['city'])){echo $_GET['city'];} ?>">
		    
		  </div>
		  <button type="submit" class="btn btn-default">Apply</button>
		</form>

	</div>
<br>
<table class="table table-bordered" style="background-color: white; border-radius: 3px;"> 
	<thead> 
		<tr> 
			<th>Addr from</th> 
			<th>Addr to</th> 
			<th>To Time / Date</th> 
			<th>Type of goods</th> 
			<th>Type of transp</th> 
			<th>Weight</th> 
			<th>Paid</th> 
		</tr> 
	</thead> 

	<tbody> 
		<!--<tr> 
			<th >1</th> 
			<td>Mark</td> 
			<td>Otto</td> 
			<td>@mdo</td> 
		</tr> -->

<?php 

foreach ($orders as $ord) {
if( (isset($_GET['fromaddr']) | isset($_GET['toaddr'])) | (isset($_GET['fromaddr']) & isset($_GET['toaddr'])) )
{
	if($ord->status == 4){
		if( ($_GET['fromaddr'] == $ord->addr_from_city | $_GET['toaddr'] == $ord->addr_to_city) | ($_GET['fromaddr'] == $ord->addr_from_city & $_GET['toaddr'] == $ord->addr_to_city) )
		{
			if(isset($_GET['tog']) & $_GET['tog'] == $ord->type_goods)
			{
	        	if(isset($_GET['tot']) & $_GET['tot'] == $ord->type_transp)
	        	{
	                echo '<tr>';
	                if(isset($_GET['obl'])){
	                    echo '<th>1' . $ord->addr_from_country . ', ' . $ord->addr_from_city . ', ' . $ord->addr_from_street . ', ' . $ord->addr_from_house . ', ' . $ord->addr_from_flat . '</th>';
	                    echo '<th>' . $ord->addr_to_country . ', ' . $ord->addr_to_city . ', ' . $ord->addr_to_street . ', ' . $ord->addr_to_house . ', ' . $ord->addr_to_flat . '</th> ';
	                }
	                else{
	                    echo '<th>' . $ord->addr_from_country . ', ' . /*$ord->addr_from_area . ', ' .*/ $ord->addr_from_city . ', ' . $ord->addr_from_street . ', ' . $ord->addr_from_house . ', ' . $ord->addr_from_flat . '</th>';
	                    echo '<th>' . $ord->addr_to_country . ', ' . /*$ord->addr_to_area . ', ' .*/ $ord->addr_to_city . ', ' . $ord->addr_to_street . ', ' . $ord->addr_to_house . ', ' . $ord->addr_to_flat . '</th> ';

	                }



	                echo '<td>';
	                if(isset($_GET['date'])){
	                    if(date_format(date_create($ord->to_date_time), 'd.m.Y') == date('d.m.Y', time()))
	                    {
	                        echo date_format(date_create($ord->to_date_time), 'H:i');
	                    }
	                    else{
	                        echo date_format(date_create($ord->to_date_time), 'H:i / d.m.Y');
	                    }
	                }

	                else{
	                    echo date_format(date_create($ord->to_date_time), 'H:i / d.m.Y');
	                }
	                $retmui = $ord->paid;
	                $retmui = intval($retmui);
	                $retmui = $retmui * 0.8;
	                echo '</td>
					<td>' . $ord->type_goods . '</td>
					<td>' . $ord->type_transp . '</td>
					<td>' . $ord->weight . '</td>
					<td>$' . $retmui . '</td>

					<td><button type="button" class="take-item" onclick="getTake(' . $ord->id . ', ' .  Auth::user()->id . ', ' .  $ord->id_customer . ')">Take</button></td>
					</tr>';
				}

			}
			
		}

		else{
			if( (isset($_GET['fromaddr']) | isset($_GET['toaddr'])) | (isset($_GET['fromaddr']) & isset($_GET['toaddr'])) & ($_GET['fromaddr'] == "" | $_GET['toaddr'] == "") | ($_GET['fromaddr'] == "" & $_GET['toaddr'] == "") ){
			if($_GET['fromaddr'] == $ord->addr_from_city | $_GET['toaddr'] == $ord->addr_to_city)
			{
			echo '<tr>';
	    	if(isset($_GET['obl'])){
	    		echo '<th>2' . $ord->addr_from_country . ', ' . $ord->addr_from_city . ', ' . $ord->addr_from_street . ', ' . $ord->addr_from_house . ', ' . $ord->addr_from_flat . '</th>';
	    		echo '<th>' . $ord->addr_to_country . ', ' . $ord->addr_to_city . ', ' . $ord->addr_to_street . ', ' . $ord->addr_to_house . ', ' . $ord->addr_to_flat . '</th> ';
	    	}
	    	else{
	    		echo '<th>' . $ord->addr_from_country . ', ' . /*$ord->addr_from_area . ', ' .*/ $ord->addr_from_city . ', ' . $ord->addr_from_street . ', ' . $ord->addr_from_house . ', ' . $ord->addr_from_flat . '</th>';
	            echo '<th>' . $ord->addr_to_country . ', ' . /*$ord->addr_to_area . ', ' .*/ $ord->addr_to_city . ', ' . $ord->addr_to_street . ', ' . $ord->addr_to_house . ', ' . $ord->addr_to_flat . '</th> ';

	    	}
				
				
				
			echo '<td>';
			if(isset($_GET['date'])){ 
				if(date_format(date_create($ord->to_date_time), 'd.m.Y') == date('d.m.Y', time()))
				{
					echo date_format(date_create($ord->to_date_time), 'H:i');
				}
				else{
					echo date_format(date_create($ord->to_date_time), 'H:i / d.m.Y');
				}
			}

			else{
				echo date_format(date_create($ord->to_date_time), 'H:i / d.m.Y');
			}
				
			echo '</td>
			<td>' . $ord->type_goods . '</td> 
			<td>' . $ord->type_transp . '</td> 
			<td>' . $ord->weight . '</td> 
			<td>' . $ord->paid . '</td> 
			</tr>';
			}
			}
		}
	}
	
		
}

else{
	if($ord->status == 4)
	{
		echo '<tr>';
    	if(isset($_GET['obl'])){
    		echo '<th>' . $ord->addr_from_country . ', ' . $ord->addr_from_city . ', ' . $ord->addr_from_street . ', ' . $ord->addr_from_house . ', ' . $ord->addr_from_flat . '</th>';
    		echo '<th>' . $ord->addr_to_country . ', ' . $ord->addr_to_city . ', ' . $ord->addr_to_street . ', ' . $ord->addr_to_house . ', ' . $ord->addr_to_flat . '</th> ';
    	}
    	else{
    		echo '<th>' . $ord->addr_from_country . ', ' . /*$ord->addr_from_area . ', ' .*/ $ord->addr_from_city . ', ' . $ord->addr_from_street . ', ' . $ord->addr_from_house . ', ' . $ord->addr_from_flat . '</th>';
                    echo '<th>' . $ord->addr_to_country . ', ' . /*$ord->addr_to_area . ', ' .*/ $ord->addr_to_city . ', ' . $ord->addr_to_street . ', ' . $ord->addr_to_house . ', ' . $ord->addr_to_flat . '</th> ';

    	}
			
			
			
		echo '<td>';
		if(isset($_GET['date'])){ 
			if(date_format(date_create($ord->to_date_time), 'd.m.Y') == date('d.m.Y', time()))
			{
				echo date_format(date_create($ord->to_date_time), 'H:i');
			}
			else{
				echo date_format(date_create($ord->to_date_time), 'H:i / d.m.Y');
			}
		}

		else{
			echo date_format(date_create($ord->to_date_time), 'H:i / d.m.Y');
		}
			
		echo '</td>
		<td>' . $ord->type_goods . '</td> 
		<td>' . $ord->type_transp . '</td> 
		<td>' . $ord->weight . '</td> 
		<td>' . $ord->paid . '</td> 
		</tr>';
	}
}
    	
}

?>

		
	</tbody> 
</table>

<!-- <div class="container">

  <div class="modal fade" id="stran_city" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    

      <div class="modal-content">
        <div class="modal-header">
        
          <h4 class="modal-title">Введите место поиска</h4>
        </div>
        <form class="p15" action="<?php echo URL::current(); ?>" method="get">
        <div class="modal-body">
          	
			  <div class="form-group">
			    <label for="exampleInputName2">Страна</label>
			    <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe" name="stra" value="<?php if(isset($_GET['stra'])){echo $_GET['stra'];} ?>" require>
			  </div>
			  
			  <div class="form-group">
			    <label for="exampleInputEmail2">Город</label>
			    <div class="box10"></div>
			    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com" name="city" value="<?php if(isset($_GET['city'])){echo $_GET['city'];} ?>">
			  </div>
			  


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Поиск</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
</div> -->
		
	</div>

</div>

<script type="text/javascript">
	window.onload = function () {

		if($('#exampleInputName2').val() == '')
		{
			$('#stran_city').modal('show');
		}
	}
</script>

@endsection