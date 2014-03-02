@extends('templates.template')


@section('content')
<div class="row">
  <div class="col-md-8">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
        <li data-target="#carousel-example-generic" data-slide-to="5"></li>
        <li data-target="#carousel-example-generic" data-slide-to="6"></li>
        <li data-target="#carousel-example-generic" data-slide-to="7"></li>
        <li data-target="#carousel-example-generic" data-slide-to="8"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="../public/packages/images/buses/image1.jpg" height="80%" width="100%">
        </div>
        <div class="item">
          <img src="../public/packages/images/buses/image2.jpg" width="100%">
        </div>
        <div class="item">
          <img src="../public/packages/images/buses/image3.jpg" width="100%">
        </div>
        <div class="item">
          <img src="../public/packages/images/buses/image4.jpg" width="100%">
        </div>
        <div class="item">
          <img src="../public/packages/images/buses/image5.jpg" width="100%">
        </div>
        <div class="item">
          <img src="../public/packages/images/buses/image6.jpg" width="100%">
        </div>
        <div class="item">
          <img src="../public/packages/images/buses/image8.jpg" width="100%">
        </div>
        <div class="item">
          <img src="../public/packages/images/buses/image9.jpg" width="100%">
        </div>
        <div class="item">
          <img src="../public/packages/images/buses/image10.jpg" width="100%">
        </div>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
  </div>

  <div class="col-md-4">
    @if(Session::has('notConfirmed'))
      @include('popups.error', array('title'=>'Confirmation', 'message' => Session::get('notConfirmed')))
    @endif
    @if(Session::has('message'))
      @include('popups.success', array('title'=>'Confirmation', 'message' => Session::get('message')))
    @endif
    @if(Session::has('warning'))
      @include('popups.error', array('title'=>'Login error', 'message' => Session::get('warning')))
    @endif
    @if(Session::has('success'))
      @include('popups.success', array('title'=>'Login error', 'message' => Session::get('success')))
    @endif
    @if(Session::has('noBus'))
      @include('popups.error', array('title'=>'Oops', 'message' => Session::get('noBus')))
    @endif
    @if($data)
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Success!</strong> You're email has been confirmed. Please <a data-target="#loginDropdown" href="#" data-toggle="dropdown"> Login</a> to continue.
      </div>
    @endif
    <div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title">Search</h3></div>
      <div class="panel-body">

        <form method="get" action="{{URL::to('search')}}">
          <div class="form-group ">
            <label class="control-group">From <i>(Origin)</i></label>
            <select data-placeholder="Choose a Country..." tabindex="1" class="form-control selectRoute1" name="from">
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

          <div class="form-group ">
            <label class="control-group">To <i>(Destination)</i></label>
            <select data-placeholder="Choose a Country..." tabindex="1" class="form-control selectRoute2" name="to">
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
    </div>
  </div>
</div> 

<div class="row">
  <div class="col-md-6">
    <div style="margin:10px 0px" class="panel panel-primary">
      <div class="panel-heading">
        {{--*/date_default_timezone_set('Asia/Manila')/*--}}
        {{--*/$date = new DateTime()/*--}}
        <h3 class="panel-title">{{date_format($date, 'l\, F j\, Y')}}
          <font class="pull-right">HOTLINE : 09277124349 </font>
         </h3>
        
      </div>
      <div class="panel-body">
        <p>
          <strong>Pangasinan Five Star Bus Company, Incorporated</strong>, or simply known as <strong>Five Star</strong> is proudly in service of the Filipino for 25 years and counting.  As one of the leading bus companies in the Philippines, we service routes mainly in the province of Pangasinan and Central Luzon plains, which includes the provinces of Nueva Ecija, Tarlac, Bulacan, Pampanga, and Northern Zambales.   Our success is driven by our team of Partners – drivers, conductors and maintenance team and our firm commitment to being a true “kaagapay sa masayang paglalakbay.”
        </p>  
      </div>
    </div>
    <div style="background-color:white">
<div class="fb-like-box" data-href="https://www.facebook.com/fivestarbus" data-width="556" data-colorscheme="dark" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>
 </div>
  </div>



<div class="col-md-6">
    <div style="margin:10px 0px" class="panel panel-primary">
      <div class="panel-heading">
       
        <h3 class="panel-title">Now hiring!</h3>
        
      </div>
      <div class="panel-body">
       <img src="../public/packages/images/now_hiring.png" width="100%">
      </div>
    </div>
  </div>


</div>

<div id="push"></div>
@stop