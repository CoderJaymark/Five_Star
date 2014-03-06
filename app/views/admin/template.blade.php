<html>
<head>
  <title>{{$title}}</title>
  {{HTML::script('packages/css/style.css')}}
  {{ HTML::style('packages/css/bootstrap.css') }}
  {{ HTML::style('packages/css/datepicker.css') }}
  {{ HTML::style('packages/css/img.css') }}

  <link rel="icon" href="../../public/packages/images/favicon.jpg" type="image/x-icon"/>

</head>
<body>
  <div class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="{{asset('packages/images/logo.png')}}"></a>
</div>
<div class="navbar-collapse collapse navbar-responsive-collapse">
  <ul class="nav navbar-nav">
    <li class="active"><a href="#">Admin</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
    <li><a href="{{URL::to('logout')}}">Logout</a></li>
</ul>                    
</div><!-- /.nav-collapse -->
</div>
    @yield('content')
</body>
</html>



{{HTML::script('packages/js/jquery.js')}}
{{HTML::script('packages/js/bootstrap.js')}}
{{HTML::script('packages/js/jquery.tablesorter.min.js')}}
{{HTML::script('packages/js/jqBootstrapValidation.js')}}
{{HTML::script('packages/js/bootstrap-datepicker.js')}}
{{HTML::script('packages/js/admin.js')}}
<script type="text/javascript">
$(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
  $('.datepicker').datepicker();
</script>
<script type="text/javascript">
  
  $(document).ready(function() 
    { 
        $("#tables").tablesorter(); 
    } 
); 

  var nowTemp = new Date();
  var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate() +9 , 0, 0, 0, 0);

  $('#depart').datepicker({
    onRender: function(date) {
      return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
  });
</script>
{{HTML::script('packages/js/jplot/jquery.jqplot.min.js')}}
{{HTML::script('packages/js/jplot/plugins/jqplot.barRenderer.min.js')}}
{{HTML::script('packages/js/jplot/plugins/jqplot.pieRenderer.min.js')}}
{{HTML::script('packages/js/jplot/plugins/jqplot.categoryAxisRenderer.min.js')}}
{{HTML::script('packages/js/jplot/plugins/jqplot.pointLabels.min.js')}}
{{HTML::style('packages/js/jplot/jquery.jqplot.min.css')}}

</body>
</html>
