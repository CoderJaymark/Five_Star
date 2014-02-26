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
{{Form::open(array('url'=>URL::to('admin/AddBus'),'class'=>'form-inline','method'=>'POST'))}}
{{Form::token()}}
<div class="panel panel-primary">
<div class="panel-heading">
        <h3 class="panel-title">Add Bus</h3>
      </div>
<div class="panel-body">
  <div class="form-group col-md-8 col-md-offset-2">
    <label class="control-label"><b>Bus Type</b></label>
        <div class="control-group {{$errors->has('BusType')?'error':''}}">
        <select class="select form-control" name="BusType">
        <option value="Ordinary">Ordinary</option>
        <option value="Aircon">Aircon</option>
        </select> 
        </div>

          <div class="control-label">
          <label><b>Bus Number</b></label>
          </div>
        <div class="control-group {{$errors->has('busplate_no')?'error':''}}">
        <input name="busno" type="text" class="form-control" placeholder="Bus number">
        </div>

        <div class="control-label">
          <label><b>Plate Number</b></label>
          </div>
        <div class="control-group {{$errors->has('busplate_no')?'error':''}}">
        <input name="busplate_no" type="text" class="form-control" placeholder="Plate number">
        </div><br><br>
        <button  class="control-group btn btn-primary pull-right">ADD</button> 
      </div>  
      </div>
      </div>
{{Form::close()}}
   

@stop