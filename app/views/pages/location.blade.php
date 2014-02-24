@extends('templates.template')


@section('content')

   <div class="col-md-10 col-md-offset-1">
    <h1 style="background-color:#202d3b; color:white; text-align:center">Location</h1>
    <div class="panel panel-primary">
      <div class ="panel-heading">
    <h4 class="panel-title">Terminal</h4>
  </div>
  <div class="panel-body">
    <h2>Pasay Terminal- Main Office</h2>
    <iframe width="860" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ph/maps?q=Five+Star+Bus+Company&amp;hl=en&amp;cid=14457351782839941141&amp;gl=PH&amp;t=m&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe>
    <small>TEL.#02-853-4772/851-6659/851-6614</small>
    <h2>Cubao Terminal</h2>
    <iframe width="860" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=5+star+bus+cubao&amp;hl=en&amp;ll=14.529792,121.005006&amp;spn=0.014104,0.022724&amp;sll=14.853482,120.994682&amp;sspn=0.901296,1.454315&amp;hq=5+star+bus&amp;hnear=Cubao,+Quezon+City,+Metro+Manila,+Philippines&amp;t=m&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe>
    <small>TEL.#02-911-7359/421-4716/421-4717</small>
    <h2>Trinoma Terminal</h2>
    <iframe width="860" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ph/maps?q=Trinoma&amp;hl=en&amp;ll=14.653005,121.03363&amp;spn=0.007318,0.011362&amp;cid=2065895614995062074&amp;gl=PH&amp;t=m&amp;z=17&amp;iwloc=A&amp;output=embed"></iframe>
    <small>CELL# 09175024726 / 09336425993</small>
   </div>
 </div>
</div>

   <div class="col-md-4">
    @if(Session::has('message'))
<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Opps!</strong> {{Session::get('message')}}
</div>
    @endif
    @if(Session::has('success'))
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Opps!</strong> {{Session::get('success')}}
</div>
    @endif
  
    
<!-- <form method="post" action="login">
  {{Form::token()}}
   		  
<form method="post" action="login">
  {{Form::token()}}
  <div class="panel panel-primary">
  <div class="panel-heading"><h3 class="panel-title">Login</h3></div>
  <div class="panel-body">
      <div class="form-group {{$errors->has('Email')? 'has-error': ''}}">
        <label class="control-label">Email  {{$errors->has('Email')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input type="email" placeholder="Email" value="{{Input::old('email')}}"
         name="email" class="form-control"/>
      </div>
      <div class="form-group {{$errors->has('password')? 'has-error': ''}}">
        <label class="control-label">Password {{$errors->has('password')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input  placeholder="Password" type="password"
         class="form-control" name="password"/>
      </div>
      <div class="form-group">
      <label class="control-label"><a href="registration">Register</a></label>
        <button class="btn btn-primary btn-large pull-right">Login</button>
      </div>
      </div>
      </div>
</form>

</form> -->

      </div>


   </form>
   </div>

@stop