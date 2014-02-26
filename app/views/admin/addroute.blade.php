<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Add Route</h3>
	</div>
	<div class="panel-body">
		<div class="form-group">
			<form method="post" action = "{{URL::action('AdminController@addRoute')}}">
				<div class="control-group {{$errors->has('leaving_from')? 'error':''}}">
					<div class="control-label">
						<b>From <i>(Origin)</i></b>
					</div>			
					<input type="text" name="add_leaving_from" class="form-control">		
				</div>
				<div class="control-group {{$errors->has('going_to')? 'error':''}}">
					<div class="control-label">
						<b>To <i>(Destination)</i></b>
					</div>			
					<input type="text" name="add_going_to" class="form-control">
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="control-label ">
							<b>Bus ID</b>
						</div>
						<select class="select form-control" name="add_busid">
							@foreach($addbus as $b)
							<option value="{{$b->busid}}">{{$b->busid}}</option>
							@endforeach
						</select>
					</div>

					<div class="col-md-6">
						<div class="control-label">
							<b>Fare </b>
						</div>
						<div class="input-group">
							<span class="input-group-addon">&#8369;  </span>
							<input type="text" name="add_amount" class="form-control">	
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-md-6 {{$errors->has('errorDpt')? 'has-error': '&nbsp;'}}">
						<div class="control-label">
							<b>Departure Date</b>
						</div>
						{{--*/$now1 = date("m/d/Y")/*--}}
						{{--*/$now = date("m/d/Y", strtotime($now1))/*--}}
						<input type="text" name="add_departure_date" placeholder="Departure Date" class="form-control datepicker" id="depart" value={{$now}}>
					</div>
					<div class="col-md-6 control-group {{$errors->has('departure_time')? 'error':''}}">
						<div class="control-label">
							<b>Departure Time</b>
						</div>
						<input type="time" name="add_departure_time" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="control-label">
							<b>Distance</b>
						</div>
						<div class="input-group">
							<input type="text" name="add_distance" class="form-control">	
							<span class="input-group-addon">KM</span>
						</div>
					</div>

					<div class="col-md-6">
						<div class="control-label">
							&nbsp;
						</div>
						<input type="submit" class="btn btn-primary form-control" value="Add route">
					</div>
				</div>	
			</form>						
		</div>
	</div>
</div>