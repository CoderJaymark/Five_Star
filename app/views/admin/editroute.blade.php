@extends('admin.template')
@section('content')
{{--*/$route = BusRoute::find($id)/*--}}
<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-primary">

			<div class="panel-heading"><h3 class="panel-title">Edit Route</h3></div>
			<div class="panel-body">
				<form method="post" action="{{URL::to('admin/saveroute')}}">
				<div class="form-group col-md-6">
					<div class="control-groupcol-md-6">
					<label class="control-label">Departure date</label>
						
						<input type="text" name="departure" placeholder="Departure Date" class="form-control" id="depart" value="{{date("m/d/Y", strtotime($route->departure_date))}}">
					</div>
				</div>

				<div class="form-group col-md-6">
					<div class="control-groupcol-md-6">
					<label class="control-label">Departure Time</label>
						<input type="text" placeholder="First name" name="time" class="form-control" value="{{$route->departure_time}}"/>
					</div>
				</div>

				<div class="form-group col-md-6">
					<div class="control-groupcol-md-6">
					<label class="control-label">From </label>
						<input type="text" placeholder="First name" value="{{$route->leaving_from}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>

				<div class="form-group col-md-6">
					<div class="control-groupcol-md-6">
					<label class="control-label">To</label>
						<input type="text" placeholder="First name" value="{{$route->going_to}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>

				<div class="form-group col-md-6">
					<div class="control-groupcol-md-6">
					<label class="control-label">Distance</label>
						<input type="text" placeholder="First name" value="{{$route->distance}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>

				<div class="form-group col-md-6">
					<div class="control-groupcol-md-6">
					<label class="control-label">Amount</label>
						<input type="text" placeholder="First name" value="{{$route->amount}}" name="amount" class="form-control"/>
					</div>
				</div>
				
				<input type="hidden" name="id" value="{{$id}}">
				<div class="form-group col-md-12">
					<div class="form-group col-md-6">
						<input type="submit" class="btn btn-primary" value="Save">
					</div>
					<div class="form-group col-md-6">
						<a class="btn btn-default" href="{{URL::to('admin/routes')}}">Cancel</a>
					</div>
				</div>
				</form>

			</div>
		</div>
</div>
@stop