<?php 
class BusReservations extends BaseModel{
	protected $table='bus_reservations';
	protected $fillable=array('busid','seatno','ticketno','user_id','status','route_id');
	protected $primaryKey='bus_resvid';
	public function user() {
		return $this->hasOne('User', 'user_id');
	}
	public function seats() {
		return $this->hasMany('Seat','seatno');
	}
	public function bus() {
		return $this->hasMany('Bus', 'busid');
	}

	
}


 ?>