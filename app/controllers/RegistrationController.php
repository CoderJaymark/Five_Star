<?php

class RegistrationController extends Controller {
	public function postRegistration() {
		$newUser = array('First_Name'=>Input::get('First_Name'),
			 'Last_Name'=>Input::get('Last_Name'),
			'Email'=>Input::get('Email'), 
			'Password'=>Input::get('Password'),
			'password_confirmation'=>Input::get('password_confirmation'),
			'Mailing_Address'=>Input::get('Mailing_Address'),
			 'Street_Address'=>Input::get('Street_Address'),
			'Phone_Number'=>Input::get('Phone_Number'));

		   $rules = array('First_Name'=>'required', 
		   	'Last_Name'=>'required',
		    'Email'=>'required',
			'Password'=>'required', 'password_confirmation'=>'required',
			'Mailing_Address'=>'required', 
			'Street_Address'=>'required',
			'Phone_Number'=>'required');



		$validator = Validator::make($newUser, $rules);
		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
	    	
			
		} 

				if($newUser['password_confirmation']!=$newUser['Password']){
	    		Session::flash('mismatchpass', 'Password Confirmation mismatch');
	    		return Redirect::back()	    		
	    		->withErrors($validator)
	    		->withInput();
	    		}
	    			
			else {
			User::create(array('Email'=>$newUser['Email'], 
				'First_Name'=>$newUser['First_Name'], 
				'Last_Name'=>$newUser['Last_Name'],
				'Password'=>Hash::make($newUser['Password']), 
				'Phone_Number'=>$newUser['Phone_Number'],
				'Mailing_Address'=>$newUser['Mailing_Address'],
				'Account_type'=>'E', 'Street_Address'=>$newUser['Street_Address']));
			
			$user_id=DB::table('users')->orderBy('created_at','desc')->take(1)->first();


					$user_id=DB::table('users')->orderBy('user_id','desc')->take(1)->first();


					$data=array('url'=>Hash::make($user_id->user_id.""),'user_id'=>$user_id->user_id,'Fname'=>$user_id->First_Name);
					
					Mail::send('pages.email',$data,function($message){

						$message->to(Input::get('Email'), Input::get('First_Name').' '.Input::get('Last_Name'))->subject('BusReservation-Registration');

					});

			return Redirect::to('/')->with('success',"You are successfully registered. Please check your email for confirmation.");
		}
	}
}