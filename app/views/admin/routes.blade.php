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
<div class="col-lg-12">
	<div class="well">
		<ul id="myTab" class="nav nav-pills">
			<li ><a href="{{URL::to('admin/panel')}}">Report</a></li>
			<li><a href="{{URL::to('admin/buses')}}" >Bus</a></li>
			<li class="active"><a href="{{URL::to('admin/routes')}}">Route</a></li>
			<li><a href="{{URL::to('admin/users')}}">User</a></li>
		</ul>
		{{--*/$busroutes = BusRoute::paginate(10)/*--}}
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Modify/Remove bus</h3>
			</div>
			<div class="panel-body">
				<table id="tables" style="background-color:white" class="table table-bordered table-hover tablesorter">
					<thead style="cursor:hand">
					<tr>
						<th class="header">ID</th>
						<th class="header">Bus ID</th>
						<th class="header">Departure</th>
						<th class="header">Time</th>
						<th class="header">From</th>
						<th class="header">To</th>
						<th class="header">Distance</th>
						<th class="header">Amount</th>
						<th>Options</th>
						</tr>
					</thead>	
					@foreach($busroutes as $route)  
					<tr>
						<td>{{$route->route_id}}</td>
						<td>{{$route->busid}}</td>
						<td>{{$route->departure_date}}</td>
						<td>{{$route->departure_time}}</td>
						<td>{{$route->leaving_from}}</td>
						<td>{{$route->going_to}}</td>
						<td>{{$route->distance}}</td>
						<td>{{$route->amount}}</td>
						<td><a href="{{route('edit_route', $route->route_id)}}">Edit</a> | <a href="{{route('delete_route', $route->route_id)}}"  onclick="return confirm('Are you sure you want to delete this?')">Delete</a></td>
					</tr>
					@endforeach
				</table>
				{{$busroutes->links()}}
			</div>
		</div>
	</div>
</div>
@stop