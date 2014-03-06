@extends('admin.template')
@section('content')
{{--*/$user = User::find($id)/*--}}
<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-primary">

			<div class="panel-heading"><h3 class="panel-title">Edit User</h3></div>
			<div class="panel-body">
				
				<div class="form-group col-md-12">
					<div class="control-groupcol-md-6">
					<label class="control-label">Email</label>
						<input type="text" placeholder="First name" value="{{$user->Email}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>

				<div class="form-group col-md-6">
					<div class="control-groupcol-md-6">
					<label class="control-label">First name</label>
						<input type="text" placeholder="First name" value="{{$user->First_Name}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>

				<div class="form-group col-md-6">
					<div class="control-groupcol-md-6">
					<label class="control-label">Last name</label>
						<input type="text" placeholder="First name" value="{{$user->Last_Name}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>

				<div class="form-group col-md-12">
					<div class="control-groupcol-md-6">
					<label class="control-label">Phone</label>
						<input type="text" placeholder="First name" value="{{$user->Phone_Number}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>

				<div class="form-group col-md-12">
					<div class="control-groupcol-md-6">
					<label class="control-label">Mailing Address</label>
						<input type="text" placeholder="First name" value="{{$user->Mailing_Address}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>

				<div class="form-group col-md-12">
					<div class="control-groupcol-md-6">
					<label class="control-label">Street Address</label>
						<input type="text" placeholder="First name" value="{{$user->Street_Address}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>
				<form method="post" action="{{URL::to('admin/saveuser')}}">
				<div class="form-group col-md-6">
					<div class="control-groupcol-md-6">
					<label class="control-label">Confirmed</label>
						<select class="form-control" value="{{$user->Regconfirm}}" name="confirm">
							<option {{($user->Regconfirm=="0")?'selected':''}} value="0">0</option>
							<option {{($user->Regconfirm=="1")?'selected':''}} value="1">1</option>
						</select>
					</div>
				</div>

				<div class="form-group col-md-6">
					<input type="hidden" name="id" value="{{$id}}">
					<div class="control-group">
					<label class="control-label">Account type</label>
						<select class="form-control" name="type">
							<option {{($user->Account_type=="A")?'selected':''}} value="A">A</option>
							<option {{($user->Account_type=="B")?'selected':''}} value="B">B</option>
							<option {{($user->Account_type=="C")?'selected':''}} value="C">C</option>
						</select>
					</div>
				</div>

				<div class="form-group col-md-12">
					<div class="form-group col-md-6">
						<input type="submit" class="btn btn-primary" value="Save">
					</div>
					<div class="form-group col-md-6">
						<a class="btn btn-default" href="{{URL::to('admin/users')}}">Cancel</a>
					</div>
				</div>
				</form>

			</div>
		</div>
</div>
@stop