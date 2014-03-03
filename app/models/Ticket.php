<?php 
class Ticket extends BaseModel{
	protected $table='tickets';
	protected $primaryKey = 'ticketno';
	protected $fillable = array('status', 'route_id', 'date', 'amount');
	public function seat(){
		return $this->hasOne('Seat','ticketno');
	}

	public function busReservation(){
		return $this->hasOne('BusReservations','bus_resvid', 'bus_resvid');
	}
	
	
}


 ?>