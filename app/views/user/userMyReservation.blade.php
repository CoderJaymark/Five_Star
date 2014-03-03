@extends('templates.template')
@section('content')

<div class="col-md-12">
<div class="row">
    @if(Session::has('cancel'))
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       {{Session::get('cancel')}}
    </div>
    @endif
</div>
@if(sizeof($data)==0)
  <div class="col-md-8 col-md-offset-2">
  <div class="well">
  <p><h1><center>
    @if(Request::path() == "myCancels")
    You have no cancels.
    @else
    You have no reservations.
    @endif
    </center></h1></p>
  </div>
  </div>
@else

    <div class="col-md-8 col-md-offset-2 row">
    {{--*/$counter1=0/*--}}
    {{--*/$priceCounter=0/*--}}
    @foreach($data as $bus)
    {{--*/$dir = $counter1%2==0?'left':'right'/*--}}
    {{--*/$counter1++/*--}}
    <div class="col-xs-6 col-md-6">
        {{--*/$distance = $bus->bus->first()->busRoute->first()->distance/*--}}
        {{--*/$fare = $bus->bus->first()->busRoute->first()->amount/*--}}
        {{--*/$type = $bus->bus->first()->bustype/*--}}
        {{--*/$busnumber = $bus->bus->first()->busnumber/*--}}
        {{--*/$platenumber = $bus->bus->first()->busplate_no/*--}}
        {{--*/$seatCount = BusReservations::where('user_id','=',Auth::user()->user_id)->where('busid', '=', $bus->bus->first()->busid)
          ->where('status', '=', 'RESERVED')->count()/*--}}
        {{--*/$totalFare = $fare * $seatCount/*--}}
        {{--*/$tip =  "<table style='background-color:black;color:white'><tr><td>Type </td><td>$type</td></tr>"/*--}}
        {{--*/$tip.="<tr><td>Distance</td><td>$distance KM</td></tr>"/*--}}
        {{--*/$tip.="<tr><td>Bus number</td><td>$busnumber</td></tr>"/*--}}
        {{--*/$tip.="<tr><td width='110px'>Plate number</td><td>$platenumber</td></tr></table><br><small><i>Click to view seats</i></small>"/*--}}
        <div id="{{$priceCounter}}" class="well trips tripData" width="100px" data-toggle="tooltip" data-placement="auto" data-html="true" title="{{$tip}}">
            <table style="color: rgba(255,255,255,0.6);" >
                <tr >
                    <td><b>From </b></td><td> {{$bus->bus->first()->busRoute->first()->leaving_from}} </td>
                </tr>
                <tr>
                    <td><b>To </b></td><td> {{$bus->bus->first()->busRoute->first()->going_to}} </td>
                </tr>
                <tr>
                    <td><b>Departure </b></td><td> {{date('F j, Y', strtotime($bus->bus->first()->busRoute->first()->departure_date))}} </td>
                </tr>
                <tr>
                    <td><b>Time </b></td><td> {{date('h:i A', strtotime($bus->bus->first()->busRoute->first()->departure_time))}} </td>
                </tr>
                <tr>
                  <td><b>Seats </b></td><td> {{$seatCount}} </td>
                </tr>
                <tr>
                  <td><b>Amount </b></td><td>&#8369; {{$totalFare}} </td>
                </tr>
            </table>
        </div>
        <table><tr><td>
       <input type="hidden" name="routeid" value="{{$bus->bus->first()->busRoute->first()->route_id}}">
        <input type="hidden" name="busid" value="{{$bus->bus->first()->busid}}">
        <div class="modal fade" id="seatModal{{$priceCounter}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title" id="myModalLabel">{{$bus->bus->first()->busRoute->first()->leaving_from}} -  {{$bus->bus->first()->busRoute->first()->going_to}}</h5>
                    </div>
                <div class="modal-body">
                 {{--*/$counter=0/*--}}  
                      {{--*/$counter1=0/*--}}  
                      {{--*/$checked_seat=null/*--}} 
                      {{--*/$isBackedSeat=0/*--}} 
                      {{--*/$var=Bus::find($bus->busid)/*--}}  
                      {{--*/$varStat=null/*--}} 
                      {{--*/$ticketID=null/*--}}   
                      {{--*/$userid = Auth::user()->user_id/*--}}
                      {{--*/$reservs = BusReservations::where('user_id', '=', $userid)->where('status','=','RESERVED')->first()/*--}}

                      <table class="col-md-offset-3">
                        <tr style="outline: thin solid black;"><td  align="center" colspan="6">FRONT</td></tr>  
                        <tr><td colspan="6">&nbsp;</td></tr> 
               
                  <!-- for viewing seats -->

                        @foreach($var->seat as $seats) <!--Bus reservation-->
                          @if($var->bustype=="Ordinary")
                            @if($counter == 0)
                              <tr>
                            @endif
                            @if($counter == 6)
                              </tr>
                            @endif
                            {{--*/$varStat=$seats->status/*--}}  

                
                            @if($counter==2 && $isBackedSeat!=47) 
                              <td>&nbsp;</td>
                            @endif
                           
                            @if($counter==5 && $isBackedSeat!=50)
                              </tr>
                              {{--*/$counter=0/*--}}
                            @endif
              
                            {{--*/$checked_seat=$seats->ticket->find($seats->ticketno)
                            ->where('ticketno','=',$seats->ticketno)->first()/*--}} 
             
                            {{--*/$uid = BusReservations::where('user_id', '=', $userid)->where('busid', '=', $checked_seat->busid)->first()/*--}}
          
                            {{$seats->ticket->user_id}}
                            <td>
                              <label>
                
                                @if($checked_seat->status=='FREE' || $checked_seat->status=='CANCEL')
                                  <img class="available"/>

                                @elseif($checked_seat->status=='RESERVED' && $uid->user_id==$userid && $uid->busid == $checked_seat->busid)
                                  {{--*/$varStat=$bus->status/*--}}  

                                  {{--*/$ticketID=$bus->bus_resvid/*--}} 
                                  @if($checked_seat->busReservation->user_id == Auth::user()->user_id)
                                  <img class="selected"/>
                                  @else
                                    <img class="booked"/>
                                  @endif
                                @else
                                  e
                                @endif

                              </label>
                            </td>
                          @endif

                          @if($var->bustype=="Aircon")
                            @if($counter == 0)
                              <tr>
                            @endif
                            @if($counter == 5)
                              </tr>
                            @endif
                            {{--*/$varStat=$seats->status/*--}}  

                
                            @if($counter==2 && $isBackedSeat!=38) 
                              <td>&nbsp;</td>
                            @endif
                           
                            @if($counter==4 && $isBackedSeat!=40)
                              </tr>
                              {{--*/$counter=0/*--}}
                            @endif
              
                            {{--*/$checked_seat=$seats->ticket->find($seats->ticketno)
                            ->where('ticketno','=',$seats->ticketno)->first()/*--}} 
             
                            {{--*/$uid = BusReservations::where('user_id', '=', $userid)->where('busid', '=', $checked_seat->busid)->first()/*--}}
          
                            {{$seats->ticket->user_id}}
                            <td>
                              <label>
                
                                @if($checked_seat->status=='FREE' || $checked_seat->status=='CANCEL')
                                  <img class="available"/>

                                @elseif($checked_seat->status=='RESERVED')
                                  {{--*/$varStat=$bus->status/*--}}  
                                  {{--*/$ticketID=$bus->bus_resvid/*--}}
                                  @if($checked_seat->ticket->first()->busReservation->first()->user_id == Auth::user()->user_id)
                                  <img class="selected"/>
                                  @else
                                    <img class="booked"/>
                                  @endif
                                @else
                                  e
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
                </div> <!-- modal-body -->
               
                     <div class="modal-footer" style="background-color:white">
                       <div class="row">                         
                        <div class="pull-left">
                            <label class="control-label">
                             <img class="available"/><span class="label label-success">Free</span>
                           </label> &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="control-label">
                             <img class="booked"/><span class="label label-success">Reserved</span>
                           </label> &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="control-label">
                             <img class="bookedseats"/><span class="label label-success">Paid</span>
                           </label> &nbsp;&nbsp;&nbsp;&nbsp;
                           <label class="control-label">
                             <img class="selected"/><span class="label label-success">Your seat/s</span>
                           </label>
                        </div>

                       </div>
                       <div class="row ">
                       <div class="col-md-8 col-md-offset-0">
         <form class="form-group" method="post" name="cancelForm" action="{{URL::to('CancelReservation')}}">
                          {{Form::token()}}
                         <input type="hidden" name="busresvid" value='{{$ticketID}}'> 
                         <input type="hidden" name="busid" value="{{$var->busid}}">
        <button type="submit" onclick="cancelFrom.form.submit()" class="btn btn-default cancel" id="cancel{{$priceCounter}}">Cancel reservation</button>
        </form>
        </div>
        <div class="col-md-4 col-md-offset-0">
          <form class="control-group" method="post" name="cancelForm" action="{{URL::to('CancelReservation')}}">
                          {{Form::token()}}
                         <input type="hidden" name="busresvid" value='{{$ticketID}}'> 
                         <input type="hidden" name="busid" value="{{$var->busid}}">
        <button onclick="return confirm(Are you sure about your reservation?)" class="btn btn-primary">Pay using PayPal</button>
        </form>
        </div>
        </div>
<br>
        <a href=""  data-dismiss="modal">Close</a>
      </div> <!-- modal-footer -->
      </div>
            </div> <!-- modal-dialog -->
        </div> <!-- modal -->
        
        </td></tr></table>
    </div> <!-- col-xs-6 col-md-6 -->
    <input type="hidden" id="hiddenPrice{{$priceCounter}}" value="{{$bus->bus->first()->busRoute->first()->amount}}">
    {{--*/$priceCounter++/*--}}
    @endforeach
</div>  <!-- row -->
    @endif
</div>
 
@stop