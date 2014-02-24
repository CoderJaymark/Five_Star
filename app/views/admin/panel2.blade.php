@extends('admin.template')
@section('content')
	<div class="row-fluid">
	<!-- START ADD BUS -->
		<!-- {{Form::open(array('url'=>URL::to('admin/AddBus'),'class'=>'form-inline','method'=>'POST'))}} -->
			{{Form::token()}}
			<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
        				<h3 class="panel-title">Add Bus</h3>
      				</div>
					<div class="panel-body">
	  					<div class="form-group">
	  						<div class="row">
		          				
		        				<div class="col-md-6 control-group {{$errors->has('busplate_no')?'error':''}}">
		        					<div class="control-label">
		          						<label><b>Bus Number</b></label>
		          					</div>
		        					<input name="busno" type="text" class="form-control" placeholder="Bus number">
		        				</div>
		        				
		        				<div class="col-md-6 control-group {{$errors->has('busplate_no')?'error':''}}">
		        					<div class="control-label">
		          						<label><b>Plate Number</b></label>
		          					</div>
		        					<input name="busplate_no" type="text" class="form-control" placeholder="Plate number">
		        				</div>
	        				</div>
	        				<br>
	        				<div class="row">
		        				<div class="col-md-6">
		        					<label class="control-label"><b>Bus Type</b></label>
			        				<div class="control-group {{$errors->has('BusType')?'error':''}}">
			        					<select class="select form-control" name="BusType" id="BusType">
									        <option value="Ordinary">Ordinary</option>
									        <option value="Aircon">Aircon</option>
			        					</select> 
			        				</div>
			        			</div>
			        			<div class="col-md-6">
			        				<label class="control-label"><b>Seats</b></label>
			        				<input name="seats" id="seats" type="text" class="form-control" value="51" readonly>
			        			</div>
			        		</div>
			        		<div class="row">
			        			<div class="col-md-6">
		        					<label class="control-label"><b>Status</b></label>
			        				<div class="control-group {{$errors->has('BusType')?'error':''}}">
			        					<select class="select form-control" name="BusStatus" id="busstatus">
									        <option value="Closed">Closed</option>
									        <option value="Onboard">Onboard</option>
									        <option value="Onroad">Onroad</option>
									        <option value="Waiting">Waiting</option>
			        					</select> 
			        				</div>
			        			</div>
			        			<div class="col-md-6">
			        				<label class="control-label">&nbsp;</label>
		          					<button class="form-control btn btn-primary">Add bus</button> 
		          				</div>
	        				</div>
	      				</div>  
	      			</div>
      			</div>

      			<div class="panel panel-primary">
					<div class="panel-heading">
        				<h3 class="panel-title">Modify/Remove bus</h3>
      				</div>
					<div class="panel-body">
	  					<div class="form-group">
	  						<div class="row">
	  							<div class="col-md-6">
									<label class="control-label">
										<b>Bus ID</b>
									</label>
									<select class="select form-control" name="busid" id="busid_modify">
									@foreach($addbus as $b)
										<option value="{{$b->busid}}">{{$b->busid}}</option>
									@endforeach
									</select>
								</div>
								<div class="col-md-6">
		        					<label class="control-label"><b>Status</b></label>
			        				<div class="control-group {{$errors->has('BusType')?'error':''}}">
			        					<select class="select form-control editable" name="BusStatus" id="busstatus_modify">
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
		        					<input id="busno_modify" name="busno" type="text" class="form-control editable" placeholder="Bus number" value="{{$addbus->first()->busnumber}}">
		        				</div>
		        				
		        				<div class="col-md-6 control-group {{$errors->has('busplate_no')?'error':''}}">
		        					<div class="control-label">
		          						<label><b>Plate Number</b></label>
		          					</div>
		        					<input name="busplate_no" id="busplate_no_modify" type="text" class="form-control editable" placeholder="Plate number"  value="{{$addbus->first()->busplate_no}}">
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

	        				<div class="control-group pull-right modifyButtons">
	        					<button class="btn btn-primary" id="editButton" onclick="removeDisable()">Edit</button>
	        					<button class="btn btn-warning">Remove</button>
	        				</div>
	        				<div class="control-group pull-right editButtons">
	        					<button class="btn btn-primary" id="cancelButton" onclick="addDisable()">Cancel</button>
	        					<button class="btn btn-warning">Save</button>
	        				</div>
	      				</div>  
	      			</div>
      			</div>
  			</div>
		<!-- {{Form::close()}} -->

		<!-- END ADD BUS -->

		<!-- START ADD ROUTE -->
		{{Form::open(array('url'=>URL::to('Admin/AddRoute'),'class'=>'form-inline','method'=>'POST'))}}
		{{Form::token()}}
			<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Add Route</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="control-group {{$errors->has('leaving_from')? 'error':''}}">
								<div class="control-label">
									<b>From <i>(Origin)</i></b>
								</div>			
								<input type="text" name="leaving_from" class="form-control">		
							</div>
							<div class="control-group {{$errors->has('going_to')? 'error':''}}">
								<div class="control-label">
									<b>To <i>(Destination)</i></b>
								</div>			
								<input type="text" name="going_to" class="form-control">
							</div>
							<div class="row">
								<div class="col-md-6 {{$errors->has('errorDpt')? 'has-error': '&nbsp;'}}">
									<div class="control-label">
										<b>Departure Date</b>
									</div>
									{{--*/$now1 = date("m/d/Y")/*--}}
              						{{--*/$now = date("m/d/Y", strtotime($now1))/*--}}
              						<input type="text" name="DepartureDate" placeholder="Departure Date" class="form-control datepicker" id="depart" value={{$now}}>
            					</div>
								<div class="col-md-6 control-group {{$errors->has('departure_time')? 'error':''}}">
									<div class="control-label">
										<b>Departure Time</b>
									</div>
									<input type="time" name="departure_time" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="control-label ">
										<b>Bus ID</b>
									</div>
									<select class="select form-control" name="busid">
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
										<input type="text" name="amount" class="form-control">	
									</div>
								</div>

								</div>

							<div class="row">
								<div class="col-md-6">
									<div class="control-label">
										<b>Distance</b>
									</div>
									<div class="input-group">
										<input type="text" name="amount" class="form-control">	
										<span class="input-group-addon">KM</span>
									</div>
								</div>

								<div class="col-md-6">
									<div class="control-label">
										&nbsp;
									</div>
									<button class="btn btn-primary form-control">Add route</button>
								</div>
							</div>							
						</div>
					</div>
				</div>

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Add Route</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="control-group {{$errors->has('leaving_from')? 'error':''}}">
								<div class="control-label">
									<b>From <i>(Origin)</i></b>
								</div>			
								<input type="text" name="leaving_from" class="form-control">		
							</div>
							<div class="control-group {{$errors->has('going_to')? 'error':''}}">
								<div class="control-label">
									<b>To <i>(Destination)</i></b>
								</div>			
								<input type="text" name="going_to" class="form-control">
							</div>
							<div class="row">
								<div class="col-md-6 {{$errors->has('errorDpt')? 'has-error': '&nbsp;'}}">
									<div class="control-label">
										<b>Departure Date</b>
									</div>
									{{--*/$now1 = date("m/d/Y")/*--}}
              						{{--*/$now = date("m/d/Y", strtotime($now1))/*--}}
              						<input type="text" name="DepartureDate" placeholder="Departure Date" class="form-control datepicker" id="depart" value={{$now}}>
            					</div>
								<div class="col-md-6 control-group {{$errors->has('departure_time')? 'error':''}}">
									<div class="control-label">
										<b>Departure Time</b>
									</div>
									<input type="time" name="departure_time" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="control-label ">
										<b>Bus ID</b>
									</div>
									<select class="select form-control" name="busid">
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
										<input type="text" name="amount" class="form-control">	
									</div>
								</div>

								</div>

							<div class="row">
								<div class="col-md-6">
									<div class="control-label">
										<b>Distance</b>
									</div>
									<div class="input-group">
										<input type="text" name="amount" class="form-control">	
										<span class="input-group-addon">KM</span>
									</div>
								</div>

								<div class="col-md-6">
									<div class="control-label">
										&nbsp;
									</div>
									<button class="btn btn-primary form-control">Add route</button>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		{{Form::close()}}
		<!-- END ADD ROUTE -->
	</div>

	@foreach($addbus as $bus)
		<input type="hidden" id="bus{{$bus->busid}}" value="{{$bus->busnumber}},{{$bus->busplate_no}},{{$bus->bustype}},{{$bus->capacity}},{{$bus->status}}">
	@endforeach
@stop