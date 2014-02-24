<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $primaryKey = 'user_id';

	protected $fillable=array('Email',
								'First_Name',
								'Last_Name',
								'Password',
								'Phone_Number',
								'Mailing_Address',
								'Account_type',
								'Street_Address');

									/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('Password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->Password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->Email;
	}

	/*

		Here Comes The validation

	*/

	public static $rules=array('Email'=>'Required|Email|Unique:users',
			'Password'=>'Required|Alphanum|Between:4,8|Confirmed',
			'Password_confirmation'=>'Required|Alphanum|Between:4,8',
			'First_Name'=>'Required',
			'Last_Name'=>'Required',
			'Phone_Number'=>'Required|Min:11',
			'Mailing_Address'=>'Required',
			'Street_Address'=>'Required',
			);
	
		
		
	
}