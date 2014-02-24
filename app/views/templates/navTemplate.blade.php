@extends('templates.template')
@section('content')
<div class="col-md-3">
 
    <div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title">Search</h3></div>
      <div class="panel-body">

        <form method="get" action="{{URL::to('search')}}">
          <div class="form-group ">
            <label class="control-group">From <i>(Origin)</i></label>
            <select data-placeholder="Choose a Country..." tabindex="1" class="form-control selectRoute1" name="from">
              <option class="selectRoutes" id="from1" value="Cubao">Cubao</option>
              <option class="selectRoutes" id="from2" value="Pasay">Pasay</option>
              <option class="selectRoutes" id="from3" value="Munoz, Nueva Ecija">Munoz, Nueva Ecija</option>
              <option class="selectRoutes" id="from4" value="Gapan, Nueva Ecija">Gapan, Nueva Ecija</option>
              <option class="selectRoutes" id="from5" value="San Miguel, Bulacan">San Miguel, Bulacan</option>
              <option class="selectRoutes" id="from6" value="Dagupan City">Dagupan City</option>
              <option class="selectRoutes" id="from7" value="Urdaneta City">Urdaneta City</option>
              <option class="selectRoutes" id="from8" value="Capaz, Tarlac">Capaz, Tarlac</option>
              <option class="selectRoutes" id="from9" value="Bolinao, Pangasinan">Bolinao, Pangasinan</option>
            </select>
          </div>

          <div class="form-group ">
            <label class="control-group">To <i>(Destination)</i></label>
            <select data-placeholder="Choose a Country..." tabindex="1" class="form-control selectRoute2" name="to">
              <option class="selectRoutes" id="to1" value="Cubao">Cubao</option>
              <option class="selectRoutes" id="to2" value="Pasay">Pasay</option>
              <option class="selectRoutes" id="to3" value="Munoz, Nueva Ecija">Munoz, Nueva Ecija</option>
              <option class="selectRoutes" id="to4" value="Gapan, Nueva Ecija">Gapan, Nueva Ecija</option>
              <option class="selectRoutes" id="to5" value="San Miguel, Bulacan">San Miguel, Bulacan</option>
              <option class="selectRoutes" id="to6" value="Dagupan City">Dagupan City</option>
              <option class="selectRoutes" id="to7" value="Urdaneta City">Urdaneta City</option>
              <option class="selectRoutes" id="to8" value="Capaz, Tarlac">Capaz, Tarlac</option>
              <option class="selectRoutes" id="to9" value="Bolinao, Pangasinan">Bolinao, Pangasinan</option>
            </select>
          </div>


          <div class="form-group">
            <div class="{{$errors->has('errorDpt')? 'has-error': '&nbsp;'}}">
              <label class="control-label">{{$errors->has('errorDpt')? '<span class="label label-danger">required</span>': ''}}</label>
              {{--*/$now1 = date("m/d/Y")/*--}}
              {{--*/$now = date("m/d/Y", strtotime($now1 . '+ 8 day'))/*--}}
              <input readOnly type="text" name="DepartureDate" placeholder="Departure Date" class="form-control" id="depart" value={{$now}}>
            </div>
          </div>
           <div class="form-group">
            <div class="{{$errors->has('errorReturn')? 'has-error': ''}}">
              <label class="control-label">{{$errors->has('errorReturn')? '<span class="label label-danger">required</span>': ''}}</label>
                <input readOnly type="text" name="ReturnDate" id="returnDate" placeholder="Return Date" class="form-control" id="return">
            </div>

          </div>

          <div class="form-group">
            <label class="radio-inline">
              <input type="radio" name="tripType" value="onewayTrip" id="onewayTrip">One way
            </label>
            <label class="radio-inline">
              <input type="radio" name="tripType" value="roundTrip" id="roundTrip" checked> Round trip
            </label>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-large form pull-right">Go!</button>
          </div>
        </form>
      </div>
    </div>
</div>
@yield('navTemp')
@stop