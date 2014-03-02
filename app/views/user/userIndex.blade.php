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
<div class="row">
    {{--*/$counter1=0/*--}}
    {{--*/$priceCounter=0/*--}}
    @foreach($data as $bus)
    {{--*/$dir = $counter1%2==0?'left':'right'/*--}}
    {{--*/$counter1++/*--}}
    <div class="col-xs-6 col-md-6">
        {{--*/$distance = $bus->busRoute->first()->distance/*--}}
        {{--*/$fare = $bus->busRoute->first()->amount/*--}}
        {{--*/$type = $bus->bustype/*--}}
        {{--*/$avail = $bus->availableseats/*--}}
        {{--*/$busnumber = $bus->busnumber/*--}}
        {{--*/$platenumber = $bus->busplate_no/*--}}
        {{--*/$tip =  "<table style='background-color:black;color:white'><tr><td>Type </td><td>$type</td></tr>"/*--}}
        {{--*/$tip.="<tr><td>Distance</td><td>$distance KM</td></tr>"/*--}}
        {{--*/$tip.="<tr><td>Seats</td><td>$avail</td></tr>"/*--}}
        {{--*/$tip.="<tr><td>Fare</td><td>&#8369; $fare</td></tr>"/*--}}
        {{--*/$tip.="<tr><td>Bus number</td><td>$busnumber</td></tr>"/*--}}
        {{--*/$tip.="<tr><td width='110px'>Plate number</td><td>$platenumber</td></tr></table><br><small><i>Click to view seats</i></small>"/*--}}
        <div id="{{$priceCounter}}" class="well trips tripData" width="100px" data-toggle="tooltip" data-placement="auto" data-html="true" title="{{$tip}}">
            <table style="color: rgba(255,255,255,0.6);" >
                <tr >
                    <td><b>From </b></td><td> {{$bus->busRoute->first()->leaving_from}} </td>
                </tr>
                <tr>
                    <td><b>To </b></td><td> {{$bus->busRoute->first()->going_to}} </td>
                </tr>
                <tr>
                    <td><b>Departure </b></td><td> {{date('F j, Y', strtotime($bus->busRoute->first()->departure_date))}} </td>
                </tr>
                <tr>
                    <td><b>Time </b></td><td> {{date('h:i A', strtotime($bus->busRoute->first()->departure_time))}} </td>
                </tr>
            </table>
        </div>
        <table><tr><td>
       <form action="{{URL::to('reservedseats')}}">
       <input type="hidden" name="routeid" value="{{$bus->busRoute->first()->route_id}}">
        <input type="hidden" name="busid" value="{{$bus->busid}}">
        <div class="modal fade" id="seatModal{{$priceCounter}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title" id="myModalLabel">{{$bus->busRoute->first()->leaving_from}} -  {{$bus->busRoute->first()->going_to}}</h5>
                    </div>
                
                <div class="modal-body" style="background-color:white">
                    {{--*/$counter=0/*--}}  
                    {{--*/$checked_seat=null/*--}} 
                    {{--*/$isBackedSeat=0/*--}}        
                    <table class="col-md-offset-3">
                        <label class="control-label" for="price{{$priceCounter}}">Price:  &#8369; 0</label>
                        <tr style="outline: thin solid black;"><td  align="center" colspan="6">FRONT</td></tr>  
                        <tr><td colspan="6">&nbsp;</td></tr> 
                        @foreach($bus->seat as $seats)
                            @if($bus->bustype=="Ordinary")
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

                            @if($bus->bustype=="Aircon")
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
                </div> <!-- modal-body -->
               
                     <div class="modal-footer" style="background-color:white">
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
         
        <button type="button" class="btn btn-default cancel" data-dismiss="modal" id="cancel{{$priceCounter}}">Cancel</button>
        <button onclick="return confirm(Are you sure about your reservation?)" class="btn btn-primary">Reserve</button>
      </div> <!-- modal-footer -->
      </div>
            </div> <!-- modal-dialog -->
        </div> <!-- modal -->
        </form>
        </td></tr></table>
    </div> <!-- col-xs-6 col-md-6 -->
    <input type="hidden" id="hiddenPrice{{$priceCounter}}" value="{{$bus->busRoute->first()->amount}}">
    {{--*/$priceCounter++/*--}}
    @endforeach
</div>  <!-- row -->
@endif
</div>
@stop