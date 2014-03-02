@extends('templates.template')
@section('content')

<div class="col-md-4">
  <ul id="myTab" class="nav nav-pills">
    <li class="active"><a href="#search" data-toggle="tab">Search</a></li>
    <li><a href="#filter" data-toggle="tab">Filter</a></li>
  </ul>
  <div class="col-md-12" style="background-color:white; padding-top:15px; padding-bottom:15px;border-radius: 0px 8px 8px 8px;">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="search">
        <form method="get" action="{{URL::to('search')}}">
          <div class="form-group ">
            <label class="control-group">From</label>
            <select data-placeholder="Choose a Country..." tabindex="1" class="form-control selectRoute1" name="from">
              <option selected value="Cubao">Cubao</option>
              <option value="Pasay">Pasay</option>
              <option disabled value="Munoz, Nueva Ecija">Munoz, Nueva Ecija</option>
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
            <select data-placeholder="Choose a Country..." tabindex="1" class="form-control selectRoute2" name="to">
              <option disabled value="Cubao">Cubao</option>
              <option value="Pasay">Pasay</option>
              <option selected value="Munoz, Nueva Ecija">Munoz, Nueva Ecija</option>
              <option value="Gapan, Nueva Ecija">Gapan, Nueva Ecija</option>
              <option value="San Miguel, Bulacan">San Miguel, Bulacan</option>
              <option value="Dagupan City">Dagupan City</option>
              <option value="Urdaneta City">Urdaneta City</option>
              <option value="Capaz, Tarlac">Capaz, Tarlac</option>
              <option value="Bolinao, Pangasinan">Bolinao, Pangasinan</option>
            </select>
          </div>
          <div class="row form-group">
            <div class="col-md-6">
              <label class="control-label">Departure</label>
              {{--*/$now1 = date("m/d/Y")/*--}}
              {{--*/$now = date("m/d/Y", strtotime($now1 . '+ 9 day'))/*--}}
              <input readOnly type="text" name="DepartureDate" placeholder="Departure Date" class="form-control" id="depart" value={{$now}}>
            </div>

            <div class="col-md-6">
              <label class="control-label" id="returnLabel">Return</label>
              <input required readOnly type="text" name="ReturnDate" id="returnDate" placeholder="Return Date" class="form-control" id="return" value={{$now}}>
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
            <label class="control-label">Bus type</label><br>
            <label class="radio-inline">
              <input type="radio" name="busType" value="aircon" id="aircon"> Aircon
            </label>
            <label class="radio-inline">
              <input type="radio" name="busType" value="ordinary" id="ordinary"> Ordinary
            </label>
            <label class="radio-inline">
              <input type="radio" name="busType" value="any" id="any" checked> Any
            </label>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-large form pull-right">Go!</button>
          </div>
        </form>

      </div>
      <div class="tab-pane fade" id="filter">
        <form method="get" action="{{URL::to('filter')}}">
          <div class="form-group">
            <label class="control-group">Filter by</label>
            <select data-placeholder="Filter..." tabindex="1" class="form-control filterSelect" name="filter">
              <option value="1">Departure date</option>
              <option value="2">Destination</option>
              <option value="3">Origin</option>
              <option value="4">Bus type</option>
            </select>
          </div>
         
          <div class="row form-group hidden_filters departure_field">
            <div class="col-md-12">
              <label class="control-label" id="filter_depart_label">Departure Date</label>
              {{--*/$now1 = date("m/d/Y")/*--}}
              {{--*/$now = date("m/d/Y", strtotime($now1 . '+ 9 day'))/*--}}
              <input readOnly type="text" name="filter_departure_date" placeholder="Departure Date" class="form-control" id="filter_depart" value={{$now}}>
            </div>
          </div>
          
          <div class="form-group hidden_filters destination_field">
            <label class="control-group">To <i>(Destination)</i></label>
            <select data-placeholder="Choose a Country..." tabindex="1" class="form-control filterSelect1" name="filter_from">
              <option value="Cubao">Cubao</option>
              <option value="Pasay">Pasay</option>
              <option selected value="Munoz, Nueva Ecija">Munoz, Nueva Ecija</option>
              <option value="Gapan, Nueva Ecija">Gapan, Nueva Ecija</option>
              <option value="San Miguel, Bulacan">San Miguel, Bulacan</option>
              <option value="Dagupan City">Dagupan City</option>
              <option value="Urdaneta City">Urdaneta City</option>
              <option value="Capaz, Tarlac">Capaz, Tarlac</option>
              <option value="Bolinao, Pangasinan">Bolinao, Pangasinan</option>
            </select>
          </div>

          <div class="form-group hidden_filters origin_field">
            <label class="control-group">From <i>(Origin)</i></label>
            <select data-placeholder="Choose a Country..." tabindex="1" class="form-control filterSelect2" name="filter_to">
              <option value="Cubao">Cubao</option>
              <option value="Pasay">Pasay</option>
              <option selected value="Munoz, Nueva Ecija">Munoz, Nueva Ecija</option>
              <option value="Gapan, Nueva Ecija">Gapan, Nueva Ecija</option>
              <option value="San Miguel, Bulacan">San Miguel, Bulacan</option>
              <option value="Dagupan City">Dagupan City</option>
              <option value="Urdaneta City">Urdaneta City</option>
              <option value="Capaz, Tarlac">Capaz, Tarlac</option>
              <option value="Bolinao, Pangasinan">Bolinao, Pangasinan</option>
            </select>
          </div>

          <div class="form-group hidden_filters type_field">
            <label class="control-label">Bus type</label><br>
            <label class="radio-inline">
              <input type="radio" name="filter_busType" value="filter_aircon" id="filter_aircon" checked> Aircon
            </label>
            <label class="radio-inline">
              <input type="radio" name="filter_busType" value="filter_ordinary" id="filter_ordinary"> Ordinary
            </label>
          </div>
          <hr>
          <p>Your query : <strong><label id="query"></label></strong></p>
          <div class="form-group">
            <button class="btn btn-primary btn-large form pull-right">Go!</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="col-md-8">
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
      <div id="{{$counter1}}" class="well trips tripData" width="100px" data-toggle="tooltip" data-placement="auto" data-html="true" title="{{$tip}}">
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

      <div class="modal fade" id="seatModal{{$counter1}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h5 class="modal-title" id="myModalLabel">{{$bus->busRoute->first()->leaving_from}} - {{$bus->busRoute->first()->going_to}}</h5>
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

       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button onclick="return confirm(Are you sure about your reservation?)" class="btn btn-primary">Reserve</button>
     </div> <!-- modal-footer -->
   </div>
 </div> <!-- modal-dialog -->
</div> <!-- modal -->

</div> <!-- col-xs-6 col-md-6 -->
@endforeach
</div>  <!-- row -->
@endif
</div>

@stop