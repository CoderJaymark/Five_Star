@extends('admin.template')
@section('content')
{{--*/$bus = Bus::find($id)/*--}}
<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-primary">

			<div class="panel-heading"><h3 class="panel-title">Edit Bus</h3></div>
			<div class="panel-body">
				
				<div class="form-group col-md-12">
					<div class="control-groupcol-md-6">
					<label class="control-label">Type</label>
						<input type="text" placeholder="First name" value="{{$bus->bustype}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>

				<form method="post" action="{{URL::to('admin/savebus')}}">
				<div class="form-group col-md-6">
					<div class="control-groupcol-md-6">
					<label class="control-label">Status</label>
						<select class="form-control" name="status">
							<option {{($bus->status=="CLOSED")?'selected':''}} value="CLOSED">CLOSED</option>
							<option {{($bus->status=="ONBOARD")?'selected':''}} value="ONBOARD">ONBOARD</option>
							<option {{($bus->status=="ONROAD")?'selected':''}} value="ONROAD">ONROAD</option>
							<option {{($bus->status=="WAITING")?'selected':''}} value="WAITING">WAITING</option>
						</select> 
					</div>
				</div>

				<div class="form-group col-md-6">
					<div class="control-groupcol-md-6">
					<label class="control-label">Plate number</label>
						<input type="text" placeholder="First name" value="{{$bus->busplate_no}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>

				<div class="form-group col-md-12">
					<div class="control-groupcol-md-6">
					<label class="control-label">Bus number</label>
						<input type="text" placeholder="First name" value="{{$bus->busnumber}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>

				<div class="form-group col-md-12">
					<div class="control-groupcol-md-6">
					<label class="control-label">Available seat</label>
						<input type="text" placeholder="First name" value="{{$bus->availableseats}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>

				<div class="form-group col-md-12">
					<div class="control-groupcol-md-6">
					<label class="control-label">Capacity</label>
						<input type="text" placeholder="First name" value="{{$bus->capacity}}"  readOnly name="First_Name" class="form-control"/>
					</div>
				</div>
			<input type="hidden" name="id" value="{{$id}}">

				<div class="form-group col-md-12">
					<div class="form-group col-md-6">
						<input type="submit" class="btn btn-primary" value="Save">
					</div>
					<div class="form-group col-md-6">
						<a class="btn btn-default" href="{{URL::to('admin/buses')}}">Cancel</a>
					</div>
				</div>
				</form>
			</div>
		</div>
</div>
@stop