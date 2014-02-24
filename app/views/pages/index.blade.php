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
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Oops!</strong> {{Session::get('notConfirmed')}}
      </div>
    @endif
    @if(Session::has('message'))
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Opps!</strong> {{Session::get('message')}}
      </div>
    @endif
    @if(Session::has('warning'))
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Opps!</strong> {{Session::get('warning')}}
      </div>
    @endif
    @if(Session::has('success'))
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Success!</strong> {{Session::get('success')}}
      </div>
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
              {{--*/$now1 = date("m/d/Y")/*--}}
              {{--*/$now = date("m/d/Y", strtotime($now1 . '+ 1 day'))/*--}}
              <input type="text" name="DepartureDate" placeholder="Departure Date" class="form-control" id="depart" value={{$now}}>
            </div>
          
            <div class="col-md-6 {{$errors->has('errorReturn')? 'has-error': ''}}">
              <label class="control-label">{{$errors->has('errorReturn')? '<span class="label label-danger">required</span>': ''}}</label>
                <input type="text" name="ReturnDate" id="returnDate" placeholder="Return Date" class="form-control" id="return">
            </div>

          </div>

          <div class="form-group">
            <label class="radio-inline">
              <input type="radio" name="busType" value="onewayTrip" id="aircon"> Aircon
            </label>
            <label class="radio-inline">
              <input type="radio" name="busType" value="roundTrip" id="ordinary"> Ordinary
            </label>
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
</div> 

<div class="row">
  <div class="col-md-6">
    <div style="margin:10px 0px" class="panel panel-primary">
      <div class="panel-heading">
        {{--*/date_default_timezone_set('Asia/Manila')/*--}}
        {{--*/$date = new DateTime()/*--}}
        <h3 class="panel-title">{{date_format($date, 'l\, F j\, Y \| g:i A')}}
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