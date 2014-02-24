<?php 
class Ticket extends BaseModel{
	protected $table='tickets';
	protected $primaryKey = 'ticketno';

	public function seat(){
		return $this->hasOne('Seat','ticketno');
	}

	public function busReservation(){
		return $this->hasOne('BusReservation','ticketno');
	}
	
	
}


 ?>