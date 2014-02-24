<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function postLogin(){
		$user=array('Email'=>Input::get('email'),
			'password'=>Input::get('password'));
		$rules=array('Email'=>'required|Email','password'=>'required');
		$validation=Validator::make($user,$rules);
		if($validation->fails()){
			return Redirect::back()->withErrors($validation)->withInput();
		}
		if(Auth::attempt($user)){
			if(Auth::user()->Account_type=='A')
				return Redirect::to('admin/page');
			else {
				Auth::logout();
				return Redirect::back()->with('notAdmin','You don\'t have enough access to see this page.');
			}
		}
		$isNull=User::where('Email','=',$user['Email'])->first();
			// $messages=($isNull==null) ? 'The email you entered does not belong to any account.' : 'Incorrect Password';
		if($isNull==null) {
			$messages = "The email you entered does not belong to any account.";
			return Redirect::back()->with('account_not_found',$messages)->withInput();
		} else {
			$messages = "The password you entered is incorrect. Please try again (make sure your caps lock is off).";
			return Redirect::back()->with('wrong_password',$messages)->withInput();
		}

		
	}
	public function postAddBus(){
		$Bus=array('busplate_no'=>Input::get('busplate_no'),
			'BusType'=>Input::get('BusType'),
			'BusCapacity'=>Input::get('BusCapacity'));
		$rules=array('busplate_no'=>'required',
			'BusType'=>'required',
			'BusCapacity'=>'required');
		$validation=Validator::make($Bus,$rules);

		if($validation->fails()){
			return Redirect::back()->withErrors($validation)->withInput();
		}
		$bus = new Bus;
		$bus->bustype=$Bus['BusCapacity'];
		$bus->capacity=30;
		$bus->availableseats=30;
		$bus->status='CLOSED';
		$bus->busplate_no=$Bus['busplate_no'];
		$bus->save();

		return Redirect::back()->with('messages','Success fully Added');

		
		

	}

	public function showPanel() {
		$forAddBus=Bus::all();
		$data=BusRoute::all();
		return View::make('admin.panel',array('title'=>"Admin panel", 'addbus'=>$forAddBus, 'busroutes'=>$data));
	}
	public function showBusStat(){
		$data=DB::table('buses')->paginate(15);
		
		
		return View::make('admin.updateBusStatus',array('data'=>$data, 'title'=>"Update Bus Status"));
	}
	public function showEditRoute(){
		$data=BusRoute::all();

		return View::make('admin.editRoute',array('data'=>$data, 'title'=>"Edit Route"));
	}
	public function showAddRoute(){
		$bus=Bus::all();
		return View::make('admin.addroute',array('bus'=>$bus, 'title'=>"Add Route"));
	}
	
}