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
			<li class="active"><a href="{{URL::to('admin/panel')}}">Report</a></li>
			<li><a href="{{URL::to('admin/buses')}}">Bus</a></li>
			<li><a href="{{URL::to('admin/routes')}}">Route</a></li>
			<li><a href="{{URL::to('admin/users')}}">User</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade in active" id="home">
				@include('admin.report')
			</div>
			
		</div>
	</div>
</div>

@foreach($addbus as $bus)
<input type="hidden" id="bus{{$bus->busid}}" value="{{$bus->busnumber}},{{$bus->busplate_no}},{{$bus->bustype}},{{$bus->capacity}},{{$bus->status}}">
@endforeach
@stop