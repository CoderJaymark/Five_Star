
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Add Bus</h3>
	</div>
	<div class="panel-body">
		<form method="post" action="{{URL::action('AdminController@postAddBus')}}">
			<div class="form-group">
				<div class="row">
					<div class="col-md-6 control-group {{$errors->has('add_busno')?'error':''}}">
						<div class="control-label">
							<label><b>Bus Number</b></label>
						</div>
						<input name="add_busno" type="text" maxlength="5" class="form-control" placeholder="Bus number" value="{{Input::old('add_busno')}}" required>
					</div>

					<div class="col-md-6 control-group {{$errors->has('add_busplate_no')?'error':''}}">
						<div class="control-label">
							<label><b>Plate Number</b></label>
						</div>
						<input name="add_busplate_no" type="text" maxlength="7" class="form-control" placeholder="Plate number" value="{{Input::old('add_busplate_no')}}" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<label class="control-label"><b>Bus Type</b></label>
						<div class="control-group {{$errors->has('add_bustype')?'error':''}}">
							<select class="select form-control" name="add_bustype" id="BusType" value="{{Input::old('add_bustype')}}">
								<option value="Ordinary">Ordinary</option>
								<option value="Aircon">Aircon</option>
							</select> 
						</div>
					</div>
					<div class="col-md-6">
						<label class="control-label"><b>Seats</b></label>
						<input name="seats" id="seats" type="text" class="form-control" value="51" readonly value="{{Input::old('seats')}}">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label class="control-label"><b>Status</b></label>
						<div class="control-group {{$errors->has('add_status')?'error':''}}">
							<select class="select form-control" name="add_status" id="busstatus" value="{{Input::old('add_busstatus')}}">
								<option value="Closed">Closed</option>
								<option value="Onboard">Onboard</option>
								<option value="Onroad">Onroad</option>
								<option value="Waiting">Waiting</option>
							</select> 
						</div>
					</div>
					<div class="col-md-6">
						<label class="control-label">&nbsp;</label>
						<input type="submit" class="form-control btn btn-primary" value="Add bus">
					</div>
				</div>
			</div>
		</form>  
	</div>
</div>