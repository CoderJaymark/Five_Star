@extends('templates.template')
@section('content')

<div class="col-md-12">
<div class="row">
    @if(Session::has('cancel'))
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Opps!</strong> {{Session::get('cancel')}}
    </div>
    @endif
</div>
@if(sizeof($data)==0)
  <div class="col-md-8 col-md-offset-2">
  <div class="well">
    <p><h1><center>You have no reservations</center></h1></p>
  </div>
  </div>
@else
    <table style="background-color:white" class="table table-bordered table-hover table-condensed">
      <thead>
      <tr style="background-color:#202d3b; color:white">
        <th>Bus number</th>
        <th>Bus type</th>
        <th>From</th>
        <th>To</th>
        <th>Departure</th>
        <th>ETD</th>
        <th>ETA</th>
        <th>Price</th>
        <th>Date of Reservation</th>
        
        <th colspan="2" style="text-align:center">Action</th>
      </tr> 
      </thead>
      @foreach($data as $dat)
        <tr>
          <td>{{$dat->bus->first()->busnumber}}</td>
          <td>{{$dat->bus->first()->bustype}}</td>
          <td>{{$dat->bus->first()->busRoute->first()->leaving_from}}</td>
          <td>{{$dat->bus->first()->busRoute->first()->going_to}}</td>
          <td>{{$dat->bus->first()->busRoute->first()->departure_date}}</td>
          <td>{{date('h:i A', strtotime($dat->bus->first()->busRoute->first()->departure_time))}}</td>
                    
          {{--*/$addTime = round($dat->bus->first()->busRoute->first()->distance / 50)/*--}}
          {{--*/$time = date('h:i A', strtotime($dat->bus->first()->busRoute->first()->departure_time) + $addTime*60*60) /*--}}
          <td>{{$time}}</td>
          <td>&#8369; {{$dat->bus->first()->busRoute->first()->amount}}</td>
          <td>{{$dat->created_at}}</td>
          <td>
            <a data-toggle="modal" href="#myModal{{$dat->busid}}">
              View seats
            </a>

            <div class="modal fade" id="myModal{{$dat->busid}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">{{BusRoute::where('route_id','=',$dat->route_id)->first()->leaving_from}} - {{BusRoute::where('route_id','=',$dat->route_id)->first()->going_to}}</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      {{--*/$counter=0/*--}}  
                      {{--*/$counter1=0/*--}}  
                      {{--*/$checked_seat=null/*--}} 
                      {{--*/$isBackedSeat=0/*--}} 
                      {{--*/$var=Bus::find($dat->busid)/*--}}  
                      {{--*/$varStat=null/*--}} 
                      {{--*/$ticketID=null/*--}}   
                      {{--*/$userid = Auth::user()->user_id/*--}}
                      {{--*/$reservs = BusReservations::where('user_id', '=', $userid)->first()/*--}}

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
                                  {{--*/$varStat=$dat->status/*--}}  

                                  {{--*/$ticketID=$dat->bus_resvid/*--}} 
                                  <img class="selected"/>
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
                            @if($counter == 6)
                              </tr>
                            @endif
                            {{--*/$varStat=$seats->status/*--}}  

                
                            @if($counter==2 && $isBackedSeat!=37) 
                              <td>&nbsp;</td>
                            @endif
                           
                            @if($counter==5 && $isBackedSeat!=40)
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
                                  {{--*/$varStat=$dat->status/*--}}  

                                  {{--*/$ticketID=$dat->bus_resvid/*--}} 
                                  <img class="selected"/>
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
                  <!--// for viewing seats -->
              
                    </div>
                    <div class="modal-footer">
                    <div class="row container" >                         
                        <div class="pull-left">
                            <label class="control-label">
                             <img class="available"/><span class="label label-success">Free</span>
                           </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="control-label">
                             <img class="selected"/><span class="label label-success">Your seat/s</span>
                           </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       
                        </div>
                        
                       </div>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </div>
          </td>
                 <td>
                        <form method="post" action="{{URL::to('PaypalOnline')}}">
                          {{Form::token()}}
                         <input type="hidden" name="busresvid" value='{{$ticketID}}'> 
                          <button onclick="return confirm('Are you sure you want to pay the reservation?')" name="pay" class="btn btn-info" value="true">
                           Pay Reservation
                         </button>

                       </form>  
                </td>
        </tr>
      @endforeach
    </table>
    {{$data->links()}}
  @endif
</div>
 
@stop