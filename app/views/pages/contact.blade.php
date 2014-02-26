@extends('templates.template')


@section('content')
    @if(Session::has('messageSent'))
        @include('popups.success', array('title'=>'Message sent', 'message' => Session::get('messageSent')))
    @endif
   <div class="col-md-10 col-md-offset-1">
   <h1 style="background-color:#202d3b; color:white; text-align:center">Contact Us</h1>
   <div class="panel panel-primary">
      <div class ="panel-heading">
    <h4 class="panel-title">Contact us</h4>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-6">
      <form method="post" action="{{URL::to('contact')}}">
        <div class="control-group {{$errors->has('Email')? 'has-error': ''}} ">
        <label class="control-label">Name {{$errors->has('Email')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input required placeholder="Name" type="text" class="form-control" name="name" value="{{Input::old('Email')}}" />
      </div>
      <div class="control-group {{$errors->has('Email')? 'has-error': ''}} ">
        <label class="control-label">Email {{$errors->has('Email')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input required placeholder="Email" type="email"
         class="form-control" name="email" value="{{Input::old('Email')}}" />
      </div>
      <div class="control-group {{$errors->has('Email')? 'has-error': ''}} ">
        <label class="control-label">Subject {{$errors->has('Email')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input required placeholder="Subject" type="text"
         class="form-control" name="subject" value="{{Input::old('Email')}}" />
      </div>
      <div class="control-group {{$errors->has('Email')? 'has-error': ''}} ">
        <label class="control-label">Message {{$errors->has('Email')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <textarea required placeholder="Message" rows="4" class="form-control" name="message" value="{{Input::old('Email')}}"></textarea>
      </div>
       <div class="control-group col-md-12"><br><br>
        <button class="btn btn-primary pull-right">Send</button>
      </div>
      </form>
      </div>

      <div class="col-md-6">
        <h1>Main Office</h1>
        <p>2220 Aurora Blvd., Tramo,<br>
          Pasay City, Philippines 1300<br>
          Tel. No.: (632) 851-6614 / (632) 851-6659<br>
          Fax No.:(632) 853-4772<br>
        </p>
        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=5+star+bus+cubao&amp;hl=en&amp;sll=14.853482,120.994682&amp;sspn=0.901296,1.454315&amp;hq=5+star+bus&amp;hnear=Cubao,+Quezon+City,+Metro+Manila,+Philippines&amp;t=m&amp;source=embed&amp;ie=UTF8&amp;ll=14.5298,121.005&amp;spn=0.011861,0.021136&amp;z=14&amp;iwloc=A&amp;cid=14457351782839941141&amp;output=embed"></iframe>
      </div>
    </div>
  </div>
</div>
   </div>

   <div class="col-md-4">
    @if(Session::has('message'))
<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Opps!</strong> {{Session::get('message')}}
</div>
    @endif
    @if(Session::has('success'))
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Opps!</strong> {{Session::get('success')}}
</div>
    @endif
  
    
<!-- <form method="post" action="login">
  {{Form::token()}}
   		  
<form method="post" action="login">
  {{Form::token()}}
  <div class="panel panel-primary">
  <div class="panel-heading"><h3 class="panel-title">Login</h3></div>
  <div class="panel-body">
      <div class="form-group {{$errors->has('Email')? 'has-error': ''}}">
        <label class="control-label">Email  {{$errors->has('Email')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input type="email" placeholder="Email" value="{{Input::old('email')}}"
         name="email" class="form-control"/>
      </div>
      <div class="form-group {{$errors->has('password')? 'has-error': ''}}">
        <label class="control-label">Password {{$errors->has('password')? 'is <span class="label label-danger">required</span>': ''}}</label>
        <input  placeholder="Password" type="password"
         class="form-control" name="password"/>
      </div>
      <div class="form-group">
      <label class="control-label"><a href="registration">Register</a></label>
        <button class="btn btn-primary btn-large pull-right">Login</button>
      </div>
      </div>
      </div>
</form>

</form> -->


      </div>


   </form>
   </div>

@stop