<?php 
class Seat extends BaseModel{
	protected $table='seats';
	protected $primaryKey = 'seatid';

	public function bus(){
		return $this->belongsTo('Bus','busid');
	}
	public function ticket(){
			return $this->belongsTo('Ticket','ticketno');
	}
	

}

 ?>
