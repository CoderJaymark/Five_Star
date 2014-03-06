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
			<li ><a href="{{URL::to('report')}}" data-toggle="tab">Report</a></li>
			<li><a href="{{URL::to('buses')}}" >Bus</a></li>
			<li><a href="{{URL::to('routes')}}">Route</a></li>
			<li class="active"><a href="{{URL::to('admin/users')}}" data-toggle="tab">User</a></li>
		</ul>
		{{--*/$busroutes = BusRoute::paginate(5)/*--}}
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Modify/Remove bus</h3>
			</div>
			<div class="panel-body">
				<table style="background-color:white" class="table table-bordered table-hover">
					<tr>
						<td>ID</td>
						<td>Bus ID</td>
						<td>Departure</td>
						<td>Time</td>
						<td>From</td>
						<td>To</td>
						<td>Distance</td>
						<td>Amount</td>
					</tr>	
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
					</tr>
					@endforeach
				</table>
				{{$busroutes->links()}}
			</div>
		</div>
	</div>
</div>