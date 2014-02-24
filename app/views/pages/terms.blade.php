@extends('templates.template')


@section('content')

   <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
      <div class ="panel-heading">
    <h4 class="panel-title">Terms and conditions</h4>
  </div>
  <div class="panel-body">
    <ol>
    <li>Online ticket purchase is currently available only for the following trips from Metro Manila:
      <ul>
        <li>Baguio City, regular aircon and deluxe services;</li>
        <li>Dagupan City, regular and aircon services. </li>
        <li>We accept advance reservations only.  We accept ticket orders for trips, eight (8) business days from today’s date.  This allows Five Star Bus Company time to process the ticket order.</li>
      </ul>
    </li>
    <li>Submit the seat reservation request form from the link below.</li>
    <li>Wait for a Five Star Bus Company customer service officer to reply to your request between 8:00 AM to 5:00 PM (PHT).</li>
      <ul>
        <li>REMINDER:
          <ul>
            <li>We accept ticket orders for advance reservations, minimum cut off is 8 business days from date of preferred trip;</li>
            <li>For reservations for trips less than eight (8) business days away, the passenger will have to purchase the ticket over the counter at a Five Star Bus terminal.</li>
          </ul>
        </li>
      </ul>
    </ol>

    @if(Auth::check())
    <input type="hidden" name="routeid" value="{{Input::get('routeid1')}}">
    <input type="hidden" name="busid" value="{{Input::get('busid1')}}">
    <input type="hidden" name="seats" value="{{Input::get('seats[]')}}">
    {{Session::flash("seats", Input::get('seats'));}}
    {{Session::flash("routeid",Input::get('routeid1'));}}
    {{Session::flash("busid", Input::get('busid1'));}}

      <p><br><a href="{{URL::to('reservedseats')}}">I understand the terms and conditions and wished to proceed</a></p>
    @endif
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