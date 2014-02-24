@extends('templates.template')


@section('content')

   <div class="col-md-10 col-md-offset-1">
   
@if($data!=null)
 <h1 style="background-color:#202d3b; color:white; text-align:center">Schedules</h1>
  <table style="background-color:white" class="table table-bordered table-hover table-condensed">
                <thead>
                  <tr style="background-color:#202d3b; color:white">
                    <th>Bus number</th>
                    <th>Bus type</th>
                    <th>Available seats</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Departure</th>
                  </tr>
                </thead>
                <tbody>
                 
                    @foreach($data as $dat)
                    <tr>
                    <td>{{$dat->busnumber}}</td>
                    <td>{{$dat->bustype}}</td>
                    <td>{{$dat->availableseats}}</td>
                    <td>{{$dat->route->leaving_from}}</td>
                    <td>{{$dat->route->going_to}}</td>
                    <td>{{$dat->route->departure_date}} {{$dat->route->departure_time}}</td>
                    
                    </tr>
                    @endforeach
              </table>

@endif
                    
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

  
      </div>
@stop