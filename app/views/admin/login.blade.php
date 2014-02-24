@extends('templates.template')

@section('navbar')
   <div class="navbar navbar-default">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#"><img style="height:10%" src="{{asset('packages/images/logo.png')}}"></a>
                </div>
                
              </div>

    
@stop

@section('content')

   <div class="col-md-4 col-md-offset-4">
    @if(Session::has('account_not_found'))
      @include('error.error', array('title'=>'Incorrect Email', 'message' => Session::get('account_not_found')))
    @endif
    @if(Session::has('wrong_password'))
      @include('error.error', array('title'=>'Please re-enter your password', 'message' => Session::get('wrong_password')))
    @endif
    @if(Session::has('notAdmin'))
      @include('error.error', array('title'=>'Access Denied', 'message' => Session::get('notAdmin')))
    @endif
    <h1>Admin Login</h1>
    <div class="well">
<form method="post" action="{{URL::to('admin/login')}}">
  {{Form::token()}}
   		<div class="form-group {{$errors->has('Email')? 'has-error': ''}}">
   			<label class="control-label">Email  {{$errors->has('Email')? 'is <span class="label label-danger">required</span>': ''}}</label>
   			<input type="email" placeholder="Email" value="{{Input::old('email')}}"
         name="email" class="form-control" required/>
   		</div>
   		<div class="form-group {{$errors->has('password')? 'has-error': ''}}">
   			<label class="control-label">Password {{$errors->has('password')? 'is <span class="label label-danger">required</span>': ''}}</label>
   			<input  placeholder="Password" type="password"
         class="form-control" name="password" required/>
   		</div>
   		<div class="form-group">
   			<button class="btn btn-primary btn-large">Login</button>
   		</div>
</form>
</div>

   </div>
@stop