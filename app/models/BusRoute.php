<?php 
class BusRoute extends BaseModel{
	protected $table='bus_routes';
	protected $primaryKey='busid';

	public function bus(){
		return $this->belongsTo('Bus','busid');
	}
	public function busReservation(){
		return $this->belongsTo('Bus','busid');
	}
	
}


 ?>