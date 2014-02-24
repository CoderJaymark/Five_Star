@extends('admin.template')


@section('content')

		<div class="row-fluid">
				
				@if(Session::has('SuccessMsg'))
					<div class="alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
								{{Session::get('SuccessMsg')}}
					</div>	
				@endif

			
						@if(!Session::has('editRoute'))
						<table class="table table-bordered">
						<thead>
								<th>Bus ID</th>
								<th>Departure Date</th>
								<th>Departure Time</th>
								<th>Going To</th>	
								<th>Leaving From</th>	
								<th>Amount</th>	
								<th>Action</th>
								

						</thead>
						<tbody>
								@foreach($data as $routes)
								<tr>
										<td>{{$routes->busid}}</td>
										<td>{{$routes->departure_date}}</td>
										<td>{{$routes->departure_time}}</td>
										<td>{{$routes->going_to}}</td>
										<td>{{$routes->leaving_from}}</td>
										<td>{{$routes->amount}}</td>
										<td>
										<form action="{{URL::to('admin/editRoute')}}" method="post">
											
				<button class="btn btn-primary" value="{{$routes->route_id}}" name="EditRoute">EDIT ROUTE</button>

										</form>

										</td>

								</tr>
								@endforeach
						</tbody>

						</table>
				
						@endif

						@if(Session::has('editRoute'))
						{{--*/$data=Session::get('data')/*--}}
								<form class="form-inline" action="{{URL::to('admin/updateRoute')}}" method="post">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">Edit Route</h3>
										</div>
										<div class="panel-body">
											<div class="form-group col-md-8 col-md-offset-2">
												<input type="hidden" name="routeid" value="{{$data->route_id}}">
												<div class="control-group">
													<div class="control-label">
														<label><b>Departure Date</b></label>
													</div>
													<input class="form-control" type="date" name="departure_date" value="{{$data->departure_date}}">	
												</div>

												<div class="control-group">
													<div class="control-label">
														<label><b>Departure Time</b></label>
													</div>
									
													<input class="form-control" type="time" name="departure_time" value="{{$data->departure_time}}">	
												</div>

												<div class="control-group">
													<div class="control-label">
														<label><b>Leaving from</b></label>
													</div>
									
													<input class="form-control" type="text" name="leaving_from" value="{{$data->leaving_from}}">	
												</div>

												<div class="control-group">
													<div class="control-label">
														<label><b>Going to</b></label>
													</div>
									
													<input class="form-control" type="text" name="going_to"  value="{{$data->going_to}}">	
												</div>

												<div class="control-group">
													<div class="control-label">
														<label><b>Amount</b></label>
													</div>
									
													<input class="form-control" type="text" name="amount"  value="{{$data->amount}}">	
												</div>
								
												<div class="control-group">
													<button class="btn btn-primary pull-right">UPDATE</button>
												</div>
											</div>
										</div>
									</div>			
								</form>
						@endif

		</div>



@stop