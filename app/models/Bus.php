<?php 
class Bus extends BaseModel{
	protected $table='buses';
	protected $primaryKey = 'busid';

	public function busRoute(){
			return $this->hasMany('BusRoute','busid');
	}	
	public function seat(){
			return $this->hasMany('Seat','busid');
	}
}

 ?>
