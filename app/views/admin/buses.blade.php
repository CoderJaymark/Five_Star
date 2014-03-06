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
			<li class="active"><a href="{{URL::to('admin/buses')}}" >Bus</a></li>
			<li><a href="{{URL::to('admin/routes')}}">Route</a></li>
			<li><a href="{{URL::to('admin/users')}}">User</a></li>
		</ul>
		{{--*/$buses = Bus::paginate(10)/*--}}
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Modify/Remove bus</h3>
			</div>
			<div class="panel-body">
				<table id="tables" style="background-color:white" class="table table-bordered table-hover tablesorter">
					<thead style="cursor:hand">
						<tr>
						<th class="header">ID</th>
						<th class="header">Bus type</th>
						<th class="header">Capacity</th>
						<th class="header">Available seats</th>
						<th class="header">Status</th>
						<th class="header">Bus number</th>
						<th class="header">Plate number</th>
						<th>Options</th>
						</tr>
					</thead>	
					<tbody>
					@foreach($buses as $bus)  
					<tr>
						<td>{{$bus->busid}}</td>
						<td>{{$bus->bustype}}</td>
						<td>{{$bus->capacity}}</td>
						<td>{{$bus->availableseats}}</td>
						<td>{{$bus->status}}</td>
						<td>{{$bus->busnumber}}</td>
						<td>{{$bus->busplate_no}}</td>
						<td><a href="{{route('edit_bus', $bus->busid)}}">Edit</a> | <a href="{{route('delete_bus', $bus->busid)}}"  onclick="return confirm('Are you sure you want to delete this?')">Delete</a></td>
					</tr>
					@endforeach
					</tbody>
				</table>
				{{$buses->links()}}
			</div>
		</div>
	</div>
</div>
@stop