@extends('admin.template')


@section('content')


    @if(Session::has('messages') && Session::get('messages')==1)
 <div class="row-fluid">
  <div class="alert alert-success">
    <button class="close" data-dismiss="alert" type="button">&times;</button> 
    Susccess Fully Added   
  </div>
  </div>
    @endif

    @if($errors->has('BusType'))
  <div class="row-fluid">
    <div class="alert alert-error">
      <button class="close" data-dismiss="alert" type="button">&times;</button> 
      {{$errors->has('BusType') ? $errors->first('BusType','<p>:message</p>') : 'Bus Type'}}   
    </div>
  </div>
    @endif

    @if($errors->has('BusCapacity'))
 <div class="row-fluid">
    <div class="alert alert-error">
      <button class="close" data-dismiss="alert" type="button">&times;</button> 
      {{$errors->has('BusCapacity') ? $errors->first('BusCapacity','<p>:message</p>') : 'Bus Capacity'}}   
    </div>
  </div>
    @endif

    @if($errors->has('busplate_no'))
 <div class="row-fluid">
    <div class="alert alert-error">
      <button class="close" data-dismiss="alert" type="button">&times;</button> 
      {{$errors->has('busplate_no') ? $errors->first('busplate_no','<p>:message</p>') : 'Bus Plate No'}}   
    </div>
  </div>
    @endif

   

@stop