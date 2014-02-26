@extends('admin.template')
@section('content')

@if(Session::has('duplicateBus'))
	@include('popups.error', array('title'=>'Possible duplicate', 'message' => Session::get('duplicateBus')))
@endif
@if(Session::has('addbusSuccess'))
	@include('popups.success', array('title'=>'Success!', 'message' => Session::get('addbusSuccess')))
@endif
@if(Session::has('successRemove'))
	@include('popups.success', array('title'=>'Success!', 'message' => Session::get('successRemove')))
@endif
@if(Session::has('successUpdate'))
	@include('popups.success', array('title'=>'Success!', 'message' => Session::get('successUpdate')))
@endif
<div class="col-lg-8 col-lg-offset-2">
	<div class="well">
		<ul id="myTab" class="nav nav-pills">
			<li class="active"><a href="#home" data-toggle="tab">Home</a></li>
			<li class="dropdown">
				<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Bus <b class="caret"></b></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
					<li><a href="#dropdown1" tabindex="-1" data-toggle="tab">Add bus</a></li>
					<li><a href="#dropdown2" tabindex="-1" data-toggle="tab">Modify/Remove bus</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Route <b class="caret"></b></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
					<li><a href="#dropdown3" tabindex="-1" data-toggle="tab">Add route</a></li>
					<li><a href="#dropdown4" tabindex="-1" data-toggle="tab">Modify/Remove route</a></li>
				</ul>
			</li>
			<li><a href="#dropdown5" data-toggle="tab">User</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade in active" id="home">

			</div>
			<div class="tab-pane fade" id="profile">
				<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
			</div>
			<div class="tab-pane fade" id="dropdown1">
				@include('admin.addbus')
			</div>
			<div class="tab-pane fade" id="dropdown2">
				@include('admin.modifybus')->with('addbus',$addbus)
			</div>
			<div class="tab-pane fade" id="dropdown3">
				@include('admin.addroute')->with('busroutes',$busroutes)->with('addbus', $addbus)
			</div>

			<div class="tab-pane fade" id="dropdown4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Modify/Remove bus</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label class="control-label">
										<b>Route ID</b>
									</label>
									<select class="select form-control" name="busid" id="busid_modify">
										@foreach($busroutes as $r)
										<option value="{{$r->busid}}">{{$r->route_id}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3">
									<label class="control-label"><b>Bus ID</b></label>
									<select class="select form-control" name="busid" id="busid_modify">
										@foreach($addbus as $b)
										<option value="{{$b->busid}}">{{$b->busid}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3">
									<label class="control-label"><b>Fare</b></label>
									<input id="busno_modify" name="busno" type="text" class="form-control editable">
								</div>
								<div class="col-md-3">
									<label class="control-label"><b>Distance</b></label>
									<input id="busno_modify" name="busno" type="text" class="form-control editable">
								</div>
							</div>
							<div class="row">

								<div class="col-md-6 control-group {{$errors->has('busplate_no')?'error':''}}">
									<div class="control-label">
										<label><b>From <i>(Origin)</i></b></label>
									</div>
									<input id="busno_modify" name="busno" type="text" class="form-control editable" placeholder="Bus number" value="{{$addbus->first()->busnumber}}">
								</div>

								<div class="col-md-6 control-group {{$errors->has('busplate_no')?'error':''}}">
									<div class="control-label">
										<label><b>To <i>(Destination)</i></b></label>
									</div>
									<input name="busplate_no" id="busplate_no_modify" type="text" class="form-control editable" placeholder="Plate number"  value="{{$addbus->first()->busplate_no}}">
								</div>
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


			<div class="tab-pane fade" id="dropdown5">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Add user</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="control-group {{$errors->has('leaving_from')? 'error':''}}">
								<div class="control-label">
									<b>Email</b>
								</div>			
								<input type="email" name="leaving_from" class="form-control">		
							</div>

							<div class="row">
								<div class="col-md-6 {{$errors->has('errorDpt')? 'has-error': '&nbsp;'}}">
									<div class="control-label">
										<b>First name</b>
									</div>
									
									<input type="text" name="DepartureDate" placeholder="First name" class="form-control" id="depart">
								</div>
								<div class="col-md-6 control-group {{$errors->has('departure_time')? 'error':''}}">
									<div class="control-label">
										<b>Last name</b>
									</div>
									<input type="text" name="departure_time" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 {{$errors->has('errorDpt')? 'has-error': '&nbsp;'}}">
									<div class="control-label">
										<b>First name</b>
									</div>
									
									<input type="text" name="DepartureDate" placeholder="First name" class="form-control" id="depart">
								</div>
								<div class="col-md-6 control-group {{$errors->has('departure_time')? 'error':''}}">
									<div class="control-label">
										<b>Last name</b>
									</div>
									<input type="text" name="departure_time" class="form-control">
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
		

		<div class="tab-pane fade" id="dropdown6">
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
	</div>
</div>

@foreach($addbus as $bus)
<input type="hidden" id="bus{{$bus->busid}}" value="{{$bus->busnumber}},{{$bus->busplate_no}},{{$bus->bustype}},{{$bus->capacity}},{{$bus->status}}">
@endforeach
@stop