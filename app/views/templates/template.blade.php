<html>
<head>
  <title>{{$title}}</title>
  {{ HTML::style('packages/css/bootstrap.css') }}
  {{ HTML::style('packages/css/datepicker.css') }}
  {{ HTML::style('packages/css/img.css') }}
  {{ HTML::style('packages/css/mystyle.css') }}

  @if(Request::is('admin/*'))
  <link rel="icon" href="../../public/packages/images/favicon.jpg" type="image/x-icon"/>
  @else
  <link rel="icon" href="packages/images/favicon.jpg" type="image/x-icon"/>
  @endif
  <style type="text/css">
    #push,
    @if(Request::path()!='admin/login') {{'#footer'}} @endif {
      height: 60px;
    }
  </style>
</head>
<body class="background">
  <div id="fb-root"></div>
    
    
    <div class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="{{asset('packages/images/logo.png')}}"></a>
      </div>
      @if(!Request::is('admin/*'))
      <div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">
          <li @if(Request::path() == '/') class="active" @endif><a href="{{URL::to('/')}}">Home</a></li>
          @if(Auth::check())
            @if(Auth::user()->Account_type=="C")
              <li @if(Request::path() == 'reservation') class="active" @endif><a href="reservation">Search</a></li>
              <li >
                <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                Reservation
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                  <li @if(Request::path() == 'myReservation') class="active" @endif><a href="myReservation">My reservations</a></li>
                  <li @if(Request::path() == 'myCancels') class="active" @endif><a href="myCancels">My cancels</a></li>
                  <li @if(Request::path() == 'payOnline') class="active" @endif><a href="payOnline">Pay online</a></li>
                </ul>
              </li>
            @endif
          @endif 
          <li @if(Request::path() == 'farematrix') class="active" @endif><a href="farematrix">Fare matrix</a></li>
          <li @if(Request::path() == 'schedules') class="active" @endif ><a href="schedules">Schedules</a></li>
          <li @if(Request::path() == 'location') class="active" @endif><a href="location">Location</a></li>
          <li @if(Request::path() == 'contact_us') class="active" @endif><a href="contact_us">Contact us</a></li>
          <li >
              <a>
                <div class="fb-like" data-href="https://facebook.com/fivestarbus" data-width="30" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
              </a>
            </li>
        </ul>
        @if(Auth::check())
          <ul class="nav navbar-nav navbar-right">
            
            <li role="presentation" class="divider"></li>
            <li >
              <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                {{Auth::user()->First_Name}} {{Auth::user()->Last_Name}}
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                <li>
                  <a role="menuitem" tabindex="-1" href="{{URL::to('logout')}}">Logout</a>
                </li>
              </ul>
            </li>
          </ul>
        @else
          <ul class="nav navbar-nav navbar-right">
            <li @if(Request::path() == 'registration') class="active" @endif><a href="registration">Register </a></li>
            <li class="dropdown" id="loginDropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login <strong class="caret"></strong></a>
              <div style="width:350px" class="dropdown-menu">
                <h3 class="col-md-12">Login</h3>
                <form method="post" action="login">
                  {{Form::token()}}
                  <div class="form-group col-md-12 {{$errors->has('Email')? 'has-error': ''}}">
                    <label class="control-label">Email  {{$errors->has('Email')? 'is <span class="label label-danger">required</span>': ''}}</label>
                    <input type="email" placeholder="Email" value="{{Input::old('email')}}" name="email" class="form-control" required/>
                  </div>
                  <div class="form-group col-md-12 {{$errors->has('password')? 'has-error': ''}}">
                    <label class="control-label">Password {{$errors->has('password')? 'is <span class="label label-danger">required</span>': ''}}</label>
                    <input  placeholder="Password" type="password" class="form-control" name="password" required/>
                  </div>
                  <div class="form-group col-md-12 ">
                    <button class="btn btn-primary btn-large pull-right">Login</button>
                  </div>
                </form>
              </div>
            </li>    
          </ul>  
        @endif
      </div><!-- /.nav-collapse -->
      @endif
    </div>
    

    <div class="container">
      @yield('content')
    </div>

    <div id="push"></div>
    <div class="navbar navbar-default navbar-fixed-bottom">
      <div class="container">
        <h6 style="color:white" class="pull-right">&copy; 2014 Five Star Bus Company, Inc. All rights reserved.</h6>
        <h6 style="color:white" class="pull-left">Developed by <a href="#">CessElle</a></h6>
      </div>     
    </div>

{{HTML::script('packages/js/jquery.min.js')}}
{{HTML::script('packages/js/bootstrap.min.js')}}

{{HTML::script('packages/js/jqBootstrapValidation.js')}}
{{HTML::script('packages/js/bootstrap-datepicker.js')}}
{{HTML::script('packages/js/myjs.js')}}
  <script type="text/javascript">
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate() +9 , 0, 0, 0, 0);
    
    var checkin = $('#depart').datepicker({
      onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate());
        checkout.setValue(newDate);
      }
      checkin.hide();
      $('#returnDate')[0].focus();
    }).data('datepicker');
    
    var checkout = $('#returnDate').datepicker({
      onRender: function(date) {
        return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      checkout.hide();
    }).data('datepicker');
  </script>

  <!-- ///////////////////////////////////////////////////////////////////// -->
  <script>

  $('.selectRoute1').change(function(){
   $(':input[name="to"] option').each(function(i, selected) {
      $(selected).prop('disabled', false);
    });
    var from = $('.selectRoute1 option:selected').text();
    $('.selectRoute2 option[value*="'+from+'"]').prop('disabled', true);

  });

    $('.selectRoute2').change(function(){
   $(':input[name="from"] option').each(function(i, selected) {
      $(selected).prop('disabled', false);
    });
    var to = $('.selectRoute2 option:selected').text();
    $('.selectRoute1 option[value*="'+to+'"]').prop('disabled', true);

  });
  </script>




   <!-- ///////////////////////////////////////////////////////////////////// -->
  <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>