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
          <th>Available seats</th>
          <th>From</th>
          <th>To</th>
          <th>Departure</th>
          <th>Actions</th>
        </tr>
      </thead>
     </table> 

       <div class="panel-group" id="accordion">
        {{--*/$c=0/*--}}
        @foreach($data as $dat)
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
              <table style="background-color:white" class="table table-bordered table-condensed">
                <tr style="background-color:#202d3b; color:white">
                  <td>{{$dat->busnumber}}</td>
                  <td>{{$dat->bustype}}</td>
                  <td>{{$dat->availableseats}}</td>
                  <td>{{$dat->busRoute->first()->leaving_from}}</td>
                  <td>{{$dat->busRoute->first()->going_to}}</td>
                  <td>{{$dat->busRoute->first()->departure_date}} {{$dat->busRoute->first()->departure_time}}</td>
                  <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$dat->busid}}">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$c}}">
                        Show seats
                      </a>
                    </button>
                  </td>
                </tr>
              </table>  
              </h4>
            </div>

            <div id="collapse{{$c}}" class="panel-collapse collapse {{($c==0)? 'in':''}}">
              <div class="panel-body">
                <form action="{{URL::to('reservedseats')}}" method="post">
                {{Form::token()}}
                  <input type="hidden" name="routeid" value="{{$dat->busRoute->first()->route_id}}">
                  <input type="hidden" name="busid" value="{{$dat->busid}}">
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
                      {{--*/$c++/*--}}
                    @endforeach
                    <tr><td colspan="6">&nbsp;</td></tr> 
                    <tr style="outline: thin solid black; margin-top:20px"><td align="center" colspan="6">BACK</td></tr>                     
                  </table>
                </form>
              </div>
            </div>
           <!--      <div class="modal-footer">
                  <div class="row">                         
                    <div class="pull-left">
                      <label class="control-label">
                        <img class="available"/><span class="label label-success">FREE</span>
                      </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label class="control-label">
                        <img class="booked"/><span class="label label-success">RESERVED</span>
                      </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label class="control-label">
                        <img class="bookedseats"/><span class="label label-success">PAID</span>
                      </label>
                    </div>
                  </div>
         
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button onclick="return confirm(Are you sure about your reservation?)" class="btn btn-primary">Save changes</button>
      </div> -->
          </div><!-- /.modal-content -->
                    @endforeach
</div>
@endif



   
</div>
 
@stop