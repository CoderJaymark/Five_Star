@extends('templates.template')


@section('content')

   <div class="col-md-8 col-md-offset-2">
   <h1 style="background-color:#202d3b; color:white; text-align:center">Fare Matrix</h1>
   	<table style="background-color:white;" class="table table-condensed table-bordered table-hover">
    <thead>
    <tr style="background-color:#202d3b; color:white">
      <th width="50%">Destination</th>
      <th colspan="2">Air-conditioned Fare</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>&nbsp;</td>
        <td>Cubao</td>
        <td>Pasay</td>
      </tr>
      {{--*/$counter=0/*--}}
      {{--*/$pasay=null/*--}}
      @foreach($fare1 as $f)
        @if($f->route_id%2==0)
          {{--*/$pasay[$counter++]=$f->amount/*--}}
        @endif
      @endforeach

      {{--*/$counter=0/*--}}
      @foreach($fare1 as $f)
        <tr>
          @if($f->route_id%2==1)
            <td>{{$f->going_to}}</td>
            <td>&#8369; {{$f->amount}}</td>
          <td>&#8369; {{$pasay[$counter++]}}</td>
          @endif 
          
          
        </tr>
        @endforeach
    </tbody>
    </table>

    <table style="background-color:white;" class="table table-condensed table-bordered table-hover">
    <thead>
    <tr style="background-color:#202d3b; color:white">
      <th width="50%">Destination</th>
      <th colspan="2">Ordinary Fare</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>&nbsp;</td>
        <td>Cubao</td>
        <td>Pasay</td>
      </tr>
      {{--*/$counter=0/*--}}
      {{--*/$pasay=null/*--}}
      @foreach($fare2 as $f)
        @if($f->route_id%2==0)
          {{--*/$pasay[$counter++]=$f->amount/*--}}
        @endif
      @endforeach

      {{--*/$counter=0/*--}}
      @foreach($fare2 as $f)
        <tr>
          @if($f->route_id%2==1)
            <td>{{$f->going_to}}</td>
            <td>&#8369; {{$f->amount}}</td>
          <td>&#8369; {{$pasay[$counter++]}}</td>
          @endif 
          
          
        </tr>
        @endforeach
    </tbody>
    </table>
 </div> <div class="col-md-4">
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

<!-- 
    <div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title">Search</h3></div>
      <div class="panel-body">

        <form method="get" action="{{URL::to('search')}}">
          <div class="form-group ">
            <label class="control-group">From</label>
            <select data-placeholder="Choose a Country..." tabindex="1" class="form-control" name="from">
              <option value="Cubao">Cubao</option>
              <option value="Pasay">Pasay</option>
              <option value="Munoz, Nueva Ecija">Munoz, Nueva Ecija</option>
              <option value="Gapan, Nueva Ecija">Gapan, Nueva Ecija</option>
              <option value="San Miguel, Bulacan">San Miguel, Bulacan</option>
              <option value="Dagupan City">Dagupan City</option>
              <option value="Urdaneta City">Urdaneta City</option>
              <option value="Capaz, Tarlac">Capaz, Tarlac</option>
              <option value="Bolinao, Pangasinan">Bolinao, Pangasinan</option>
            </select>
          </div>

          <div class="form-group ">
            <label class="control-group">To</label>
            <select data-placeholder="Choose a Country..." tabindex="1" class="form-control" name="to">
              <option value="Cubao">Cubao</option>
              <option value="Pasay">Pasay</option>
              <option value="Munoz, Nueva Ecija">Munoz, Nueva Ecija</option>
              <option value="Gapan, Nueva Ecija">Gapan, Nueva Ecija</option>
              <option value="San Miguel, Bulacan">San Miguel, Bulacan</option>
              <option value="Dagupan City">Dagupan City</option>
              <option value="Urdaneta City">Urdaneta City</option>
              <option value="Capaz, Tarlac">Capaz, Tarlac</option>
              <option value="Bolinao, Pangasinan">Bolinao, Pangasinan</option>
            </select>
          </div>

          <div class="row form-group">
            <div class="col-md-6 {{$errors->has('errorDpt')? 'has-error': '&nbsp;'}}">
              <label class="control-label">{{$errors->has('errorDpt')? '<span class="label label-danger">required</span>': ''}}</label>
              <input type="text" name="DepartureDate" placeholder="Departure Date" class="form-control datepicker">
            </div>
          
            <div class="col-md-6 {{$errors->has('errorReturn')? 'has-error': ''}}">
              <label class="control-label">{{$errors->has('errorReturn')? '<span class="label label-danger">required</span>': ''}}</label>
                <input type="text" name="ReturnDate" id="returnDate" placeholder="Return Date" class="form-control datepicker">
            </div>
          </div>

          <div class="form-group">
            <label class="radio-inline">
              <input type="radio" name="tripType" value="onewayTrip" id="onewayTrip" checked>One way
            </label>
            <label class="radio-inline">
              <input type="radio" name="tripType" value="roundTrip" id="roundTrip" > Round trip
            </label>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-large form pull-right">Go!</button>
          </div>
        </form>
      </div>
    </div> -->
      </div>
@stop