@extends('templates.template')


@section('content')

   <div class="col-md-8 col-md-offset-2">
    @if(Session::has('message'))
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Opps!</strong> {{Session::get('message')}}
</div>
    @endif
     @if(Session::has('warning'))
<div class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Opps!</strong> {{Session::get('warning')}}
</div>
    @endif

  @if(Session::has('mismatchpass'))
<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Opps!</strong> {{Session::get('mismatchpass')}}
</div>
    @endif

    

<form method="post" action="register">
<div class="panel panel-primary">

    <div class="panel-heading"><h3 class="panel-title">Registration</h3></div>
    <div class="panel-body">
  {{Form::token()}}
  <div class="form-group col-md-12">
      <div class="control-group {{$errors->has('First_Name')? 'has-error': ''}} col-md-6">
        <label class="control-label">First name  {{$errors->has('First_Name')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input type="text" placeholder="First name" value="{{Input::old('First_Name')}}"  required name="First_Name" class="form-control"/>
      </div>
      <div class="control-group {{$errors->has('Last_Name')? 'has-error': ''}} col-md-6">
        <label class="control-label">Last name {{$errors->has('Last_Name')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input  required placeholder="Last Name" type="text"
         class="form-control" name="Last_Name" value="{{Input::old('Last_Name')}}"/>
      </div>
      <div class="control-group {{$errors->has('Email')? 'has-error': ''}}  col-md-6">
        <label class="control-label">Email {{$errors->has('Email')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input  required placeholder="Email" type="Email"
         class="form-control" name="Email" value="{{Input::old('Email')}}" />
      </div>
      <div class="control-group {{$errors->has('Password')? 'has-error': ''}}  col-md-6">
        <label class="control-label">Password {{$errors->has('Password')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input  required placeholder="Password" type="Password"
         class="form-control" name="Password"/>
      </div>
      <div class="control-group {{$errors->has('password_confirmation')? 'has-error': ''}}  col-md-6">
        <label class="control-label">Password Confirmation{{$errors->has('password_confirmation')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input  required placeholder="Password Confirmation" type="password"
         class="form-control" name="password_confirmation"/>
      </div>

      <div class="control-group {{$errors->has('Mailing_Address')? 'has-error': ''}}  col-md-6">
        <label class="control-label">Mailing Address {{$errors->has('Mailing_Address')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input  required placeholder="Mailing Address" type="text"
         class="form-control" name="Mailing_Address" value="{{Input::old('Mailing_Address')}}"/>
      </div>
      <div class="control-group {{$errors->has('Street_Address')? 'has-error': ''}}  col-md-6">
        <label class="control-label">Street Address {{$errors->has('Street_Address')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input  required placeholder="Street Address" type="text"
         class="form-control" name="Street_Address" value="{{Input::old('Street_Address')}}"/>
      </div>
      <div class="control-group {{$errors->has('Phone_Number')? 'has-error': ''}}  col-md-6">
        <label class="control-label">Phone number {{$errors->has('Phone_Number')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input  required placeholder="Phone number" type="text"
         class="form-control" name="Phone_Number" value="{{Input::old('Phone_Number')}}"/>
      </div>
      
      <div class="control-group col-md-12"><br><br>
        <button class="btn btn-primary pull-right">Register</button>
      </div>
      </div>
      </div>
</form>
</div>

   </div>
@stop