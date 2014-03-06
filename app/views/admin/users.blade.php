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
			<li><a href="{{URL::to('admin/routes')}}">Route</a></li>
			<li class="active"><a href="{{URL::to('admin/users')}}">User</a></li>
		</ul>
		{{--*/$users = User::paginate(10)/*--}}
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Add user</h3>
			</div>
			<div class="panel-body">
				<table id="tables" style="background-color:white" class="table table-bordered table-hover tablesorter">
					<thead style="cursor:hand">
					<tr>
						<th class="header">ID</th>
						<th class="header">E-mail</th>
						<th class="header">First name</th>
						<th class="header">Last name</th>
						<th class="header">Phone number</th>
						<th class="header">Mailing address</th>
						<th class="header">Street address</th>
						<th class="header">Confirmed?</th>
						<th class="header">Account type</th>
						<th class="header">Options</th>
						</tr>
					</thead>

					@foreach($users as $user)
					<tr>
						<td>{{$user->user_id}}</td>
						<td>{{$user->Email}}</td>
						<td>{{$user->First_Name}}</td>
						<td>{{$user->Last_Name}}</td>
						<td>{{$user->Phone_Number}}</td>
						<td>{{$user->Mailing_Address}}</td>
						<td>{{$user->Street_Address}}</td>
						<td>{{$user->Regconfirm}}</td>
						<td>{{$user->Account_type}}</td>
						<td><a href="{{route('edit_user', $user->user_id)}}">Edit</a> | <a href="{{route('delete_user', $user->user_id)}}" onclick="return confirm('Are you sure you want to delete this?')">Delete</a></td>
					</tr>
					@endforeach

				</table>
				{{$users->links()}}
			</div>
		</div>
		
	</div>
</div>
@stop