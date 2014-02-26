<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Modify/Remove bus</h3>
	</div>
	<div class="panel-body">
		<div class="form-group">
		<form method="post" action="{{URL::action('AdminController@updateBus')}}">
				<div class="row">

					<div class="col-md-6">
						<label class="control-label">
							<b>Bus ID</b>
						</label>
						<select class="select form-control" name="modify_busid" id="modify_busid">
							@foreach($addbus as $b)
							<option value="{{$b->busid}}">{{$b->busid}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6">
						<label class="control-label"><b>Status</b></label>
						<div class="control-group {{$errors->has('BusType')?'error':''}}">
							<select class="select form-control editable" name="BusStatus" id="modify_busstatus">
								{{--*/$status = $addbus->first()->status/*--}}
								<option value="CLOSED" {{$status=='CLOSED'?'selected':''}}>Closed</option>
								<option value="ONBOARD" {{$status=='ONBOARD'?'selected':''}}>Onboard</option>
								<option value="ONROAD" {{$status=='ONROAD'?'selected':''}}>Onroad</option>
								<option value="WAITING" {{$status=='WAITING'?'selected':''}}>Waiting</option>
							</select> 
						</div>
					</div>
				</div>
				<div class="row">

					<div class="col-md-6 control-group {{$errors->has('busplate_no')?'error':''}}">
						<div class="control-label">
							<label><b>Bus Number</b></label>
						</div>
						<input id="busno_modify" name="modify_busno" type="text" class="form-control editable" placeholder="Bus number" value="{{Input::old('modify_busno')}}">
					</div>

					<div class="col-md-6 control-group {{$errors->has('busplate_no')?'error':''}}">
						<div class="control-label">
							<label><b>Plate Number</b></label>
						</div>
						<input name="modify_busplate_no" id="busplate_no_modify" type="text" class="form-control editable" placeholder="Plate number"  value="{{Input::old('modify_busplate_no')}}">
					</div>
				</div>

				<div class="row">

					<div class="col-md-6 control-group {{$errors->has('busplate_no')?'error':''}}">
						<div class="control-label">
							<label><b>Bus Type</b></label>
							<div class="control-group {{$errors->has('BusType')?'error':''}}">
								<select class="select form-control editable" name="BusType" id="bustype_modify"  value="{{$addbus->first()->bustype}}">
									<option value="Ordinary">Ordinary</option>
									<option value="Aircon">Aircon</option>
								</select> 
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<label class="control-label"><b>Seats</b></label>
						<input name="seats" id="seats_modify" type="text" class="form-control editable"  value="{{$addbus->first()->capacity}}" readonly >
					</div>
				</div>
				<br>

				
				<div class="control-group pull-right editButtons">

					<a class="btn btn-primary" id="cancelButton" onclick="addDisable()">Cancel</a>
					<input type="submit" class="btn btn-warning " value="Save">

				</div>
				</form>
				<div class="control-group pull-right modifyButtons">

					<form method="post" action="{{URL::action('AdminController@removeBus')}}">
						<input type="hidden" name="busid_to_delete" id="busid_to_delete" value="">
						<a class="btn btn-primary" id="editButton" onclick="removeDisable()">Edit</a>
						<input type="submit" class="btn btn-warning " value="Remove" onclick="return alert('Alert you sure you want to delete this bus?')" name="confirm" >
					</form>
				</div>
			
		</div>  
	</div>
</div>
