@extends('templates.navTemplate')
@section('navTemp')

<div class="col-md-8">
 <div class="row">
 @if($data==null)
  <div class="alert alert-dismissable alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              @if($date=="true")
              No bus found leaving on <strong>{{Input::get('searchDate')}}</strong>
              @endif
              @if($location=="true")
              No bus found leaving from <strong>{{Input::get('from')}}</strong> and going to <strong>{{Input::get('to')}}</strong>
              @endif
            </div>
 @endif
  </div> 

@if($data!=null)

  <table style="background-color:white" class="table table-bordered table-hover table-condensed">
                <thead>
                  <tr style="background-color:#202d3b; color:white">
                    <th>Bus number</th>
                    <th>Bus type</th>
                    <th>Seats</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Departure</th>
                    <th>ETD</th>
                    <th>ETA</th>
                    <th>Fare</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    {{--*/$priceCounter=0/*--}}
                    @foreach($data as $dat)
                    
                    <tr>
                    <td>{{$dat->busnumber}}</td>
                    <td>{{$dat->bustype}}</td>
                    <td>{{$dat->availableseats}}</td>
                    <td>{{$dat->busRoute->first()->leaving_from}}</td>
                    <td>{{$dat->busRoute->first()->going_to}}</td>
                    <td>{{$dat->busRoute->first()->departure_date}}</td>
                    <td>{{date('h:i A', strtotime($dat->busRoute->first()->departure_time))}}</td>
                    
                    {{--*/$addTime = round($dat->busRoute->first()->distance / 50)/*--}}
                    {{--*/$time = date('h:i A', strtotime($dat->busRoute->first()->departure_time) + $addTime*60*60) /*--}}
                    <td>{{$time}}</td>
                    <td>&#8369; {{$dat->busRoute->first()->amount}}</td>
                    <td>
                    <a href="#myModal{{$dat->busid}}" data-toggle="modal">Show seats</a>
                        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$dat->busid}}">
          Show seats
                        </button> -->

<form action="{{URL::to('terms')}}" method="post">
{{Form::token()}}
<input type="hidden" name="routeid1" value="{{$dat->busRoute->first()->route_id}}">
<input type="hidden" name="busid1" value="{{$dat->busid}}">
                           <!-- Modal -->
<div class="modal fade" id="myModal{{$dat->busid}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">{{$dat->busRoute->first()->leaving_from}} - {{$dat->busRoute->first()->going_to}}</h4>
      </div>
      <div class="modal-body">
        

{{--*/$counter=0/*--}}  
{{--*/$checked_seat=null/*--}} 
{{--*/$isBackedSeat=0/*--}}        
<table class="col-md-offset-3">
<label class="control-label" for="price{{$priceCounter}}">Price:  &#8369; 0</label>
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
                   <input class="prices prices-{{$priceCounter}}" name="seats[]"  value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox" > 
                   
                   @elseif($checked_seat->status=='RESERVED')
                    <img class="booked"/>
                    <input class="prices prices-{{$priceCounter}}" name="seats[]" disabled value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox"> 
                  
                   @elseif($checked_seat->status=='PAID')
                    <input class="prices prices-{{$priceCounter}}" name="seats[]" disabled value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox"> 
                    
                    @else
                    <img class="available"/>
                   <input class="prices prices-{{$priceCounter}}" name="seats[]"  value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox"> 
                
                   

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
                   <input class="prices prices-{{$priceCounter}}" name="seats[]"  value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox" > 
                   
                   @elseif($checked_seat->status=='RESERVED')
                    <img class="booked"/>
                    <input class="prices prices-{{$priceCounter}}" name="seats[]" disabled value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox"> 
                  
                   @elseif($checked_seat->status=='PAID')
                    <input class="prices prices-{{$priceCounter}}" name="seats[]" disabled value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox"> 
                    
                    @else
                    <img class="available"/>
                   <input class="prices prices-{{$priceCounter}}" name="seats[]"  value="{{$seats->ticketno.'-'.$seats->seatno}}" type="checkbox"> 
                
                   

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
      <div class="row container">
      <div class="pull-left">
         <p><label class="control-label" for="term{{$priceCounter}}"><input id="term{{$priceCounter}}" class="terms terms{{$priceCounter}}" type="checkbox">I agree to the <a href="terms">terms and conditions.</a></label></p>
         </div>
         </div>
                       <div class="row container" >                         
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
         
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button onclick="return confirm('Are you sure about your reservation?')" id="agree{{$priceCounter}}" disabled class="btn btn-info" value="true">Reserve</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>
                    </td>
                    </tr>
                    <input type="hidden" id="hiddenPrice{{$priceCounter}}" value="{{$dat->busRoute->first()->amount}}">
                    {{--*/$priceCounter++/*--}}
                    @endforeach
              </table>

@endif



   
</div>
 
@stop