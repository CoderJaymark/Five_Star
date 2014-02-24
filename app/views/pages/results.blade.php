@extends('templates.template')
@section('content')
 


 <div class="col-md-4">
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
    </div>
      </div>

<div class="col-md-8" style="margin-top:50px;margin-left:1px">
@if($data==null)
  <div class="alert alert-dismissable alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Oh snap!</strong> Search for {{date('Y-m-d',strtotime(Input::get('DepartureDate')))}} Not Found.
            </div>
  </div>
 @endif
   @if(Session::has('warning'))
<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Opps!</strong> {{Session::get('warning')}}
</div>
    @endif
@if(Session::has('notLogin'))
 <div class="col-md-8">
  <div class="alert alert-dismissable alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{Session::get('notLogin')}} <br>
              Please <strong><a href="registration">Register </a></strong>or<strong><a data-target="#loginDropdown" href="#" data-toggle="dropdown"> Login</a></strong>
            </div>
  </div>
 @endif
@if($data!=null)


  <table style="background-color:white" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Bus number</th>
                    <th>Bus type</th>
                    <th>Available seats</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Departure Date</th>
                    <th>Estimated time of departure</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                 
                    @foreach($data as $dat)
                    <tr>
                    <td>{{$dat->busnumber}}</td>
                    <td>{{$dat->bustype}}</td>
                    <td>{{$dat->availableseats}}</td>
                    <td>{{$dat->busRoute->first()->leaving_from}}</td>
                    <td>{{$dat->busRoute->first()->going_to}}</td>
                    <td>{{$dat->busRoute->first()->departure_date}}</td>
                     <td>{{$dat->busRoute->first()->departure_time}}</td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$dat->busid}}">
                         View
                        </button>

<form action="{{URL::to('reservedseats')}}" method="post">
{{Form::token()}}
<input type="hidden" name="routeid" value="{{$dat->busRoute->first()->route_id}}">
<input type="hidden" name="busid" value="{{$dat->busid}}">
                           <!-- Modal -->
<div class="modal fade" id="myModal{{$dat->busid}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Bus Reservation</h4>
      </div>
      <div class="modal-body">
        

{{--*/$counter=0/*--}}  
{{--*/$checked_seat=null/*--}} 
{{--*/$isBackedSeat=0/*--}}        
<table >
  <tr style="outline: thin solid black;"><td  align="center" colspan="6">FRONT</td></tr>  
  <tr><td colspan="6">&nbsp;</td></tr> 
          @foreach($dat->seat as $seats)
            @if($dat->bustype=="Ordinary")
            @if($counter == 0)
              <tr>
            @endif
            @if($counter == 6)
              </tr>
            @endif
                @if($counter==2 && $isBackedSeat!=47)
                 <td>&nbsp;</td>


                @endif
                @if($counter==5 && $isBackedSeat!=50)
                  </tr>
                  {{--*/$counter=0/*--}}
                @endif
              
              {{--*/$checked_seat=$seats->ticket->find($seats->ticketno)
              ->where('ticketno','=',$seats->ticketno)->first()/*--}} 
                <td>
                <label>
                  

                    @if($checked_seat->status=='FREE')
                                        <img class="available"/>
                   <input name="seats[]"  value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox" > 
                   
                   @elseif($checked_seat->status=='RESERVED')
                    <img class="booked"/>
                    <input name="seats[]" disabled value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox"> 
                  
                   @elseif($checked_seat->status=='PAID')
                    <input name="seats[]" disabled value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox"> 
                    
                    @else
                    <img class="available"/>
                   <input name="seats[]"  value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox"> 
                
                   

                    @endif
                </label>
                 </td>
          @endif

           @if($dat->bustype=="Aircon")
            @if($counter == 0)
              <tr>
            @endif
            @if($counter == 5)
              </tr>
            @endif
                @if($counter==2 && $isBackedSeat!=38)
                  <td>&nbsp;</td>

                @endif
                @if($counter==4 && $isBackedSeat!=40)
                  </tr>
                  {{--*/$counter=0/*--}}
                @endif
              
              {{--*/$checked_seat=$seats->ticket->find($seats->ticketno)
              ->where('ticketno','=',$seats->ticketno)->first()/*--}} 
                <td>
                <label>
                  

                    @if($checked_seat->status=='FREE')
                                        <img class="available"/>
                   <input name="seats[]"  value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox" > 
                   
                   @elseif($checked_seat->status=='RESERVED')
                    <img class="booked"/>
                    <input name="seats[]" disabled value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox"> 
                  
                   @elseif($checked_seat->status=='PAID')
                    <input name="seats[]" disabled value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox"> 
                    
                    @else
                    <img class="available"/>
                   <input name="seats[]"  value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox"> 
                
                   

                    @endif
                </label>
                 </td>
          @endif
 {{--*/$counter++/*--}}
  {{--*/$isBackedSeat++/*--}}
          @endforeach
          <tr><td colspan="6">&nbsp;</td></tr> 
<tr style="outline: thin solid black; margin-top:20px"><td align="center" colspan="6">BACK</td></tr>                     
</table>
      </div>
      <div class="modal-footer">
                       <div class="row">                         
                        <div class="pull-left">
                            <label class="control-label">
                             <img class="available"/><span class="label label-success">Free</span>
                           </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="control-label">
                             <img class="booked"/><span class="label label-success">Reserved</span>
                           </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="control-label">
                             <img class="bookedseats"/><span class="label label-success">Paid</span>
                           </label>
                        </div>

                       </div>
         
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button onclick="return confirm(Are you sure about your reservation?)" class="btn btn-primary">Reserve</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>
                    </td>
                    </tr>
                    @endforeach
              </table>


@endif



</div>
   </div>

@stop