<?php 

	class BaseModel extends Eloquent
	{
	
	
	    public $timestamps = false;

		public static function validate($inputs)
		{

			return Validator::make($inputs,static::$rules);
		}

	}



 ?>