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
				return Redirect::back()->with('notAdmin','You don\'t have enough access to see this page.')->withInput();
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
		$Bus=array('add_busno'=>Input::get('add_busno'),
			'add_busplate_no'=>Input::get('add_busplate_no'),
			'add_bustype'=>Input::get('add_bustype'),
			'add_status'=>Input::get('add_status'),
			'capacity'=>Input::get('seats'));
		$rules=array('add_busno'=>'required',
			'add_busplate_no'=>'required',
			'add_bustype'=>'required'
			);
		$validation=Validator::make($Bus,$rules);

		if($validation->fails()){
			return Redirect::back()->withErrors($validation)->withInput();
		}
		$existingBus = Bus::where('busnumber','=',$Bus['add_busno'])->orWhere('busplate_no', '=', $Bus['add_busplate_no'])->first();
		if($existingBus!=null) {
			return Redirect::back()->with('duplicateBus','Two buses can\'t have the same bus number or plate number.')->withInput();
		}
		$bus = new Bus;
		$bus->busnumber = $Bus['add_busno'];
		$bus->bustype=$Bus['add_bustype'];
		$bus->capacity=$Bus['capacity'];
		$bus->availableseats=$Bus['capacity'];
		$bus->status=$Bus['add_status'];
		$bus->busplate_no=$Bus['add_busplate_no'];
		$bus->save();

		return Redirect::to('admin/panel')->with('addbusSuccess','Success fully added');
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
	public function removeBus() {
		$bus = Bus::find(intval(Input::get('busid_to_delete')));
		$bus->delete();
		return Redirect::to('admin/panel')->with('successRemove', "Bus successfully deleted!");
	}

	public function updateBus() {
		$busid = Input::get('modify_busid');
		$status = Input::get('BusStatus');
		$number = Input::get('modify_busno');
		$plate_no = Input::get('modify_busplate_no');
		$type = Input::get('BusType');
		$seats = Input::get('seats');

		$bus = Bus::find($busid);
		$bus->status = $status;
		$bus->busnumber = $number;
		$bus->busplate_no = $plate_no;
		$bus->capacity = $seats;
		$bus->bustype = $type;

		$bus->save();

		return Redirect::to('admin/panel')->with('successUpdate', 'Bus successfully updated!');

	}

	public function addRoute() {
		$busid = Input::get('add_busid');
		$dept_date = new DateTime(Input::get('add_departure_date'));
		$dept_time = Input::get('add_departure_time');
		$from = Input::get('add_leaving_from');
		$to = Input::get('add_going_to');
		$distance = Input::get('add_distance');
		$fare = Input::get('add_amount');

		$route = new BusRoute;
		$route->busid = $busid;
		$route->departure_date = $dept_date->format('Y-m-d');
		$route->departure_time = $dept_time;
		$route->going_to = $to;
		$route->leaving_from = $from;
		$route->distance = $distance;
		$route->amount = $fare;

		$route->save();

		return Redirect::to('admin/panel')->with('addbusSuccess', 'Successfully added!');
	}
	
	public function showUsers() {
		return View::make('admin.users', array("title"=>"Users"));
	}

	public function showBuses() {
		return View::make('admin.buses', array("title"=>"Bus"));
	}

	public function showRoutes() {
		return View::make('admin.routes', array("title"=>"Routes"));
	}

	public function deletebus($id) {
		Bus::find($id)->delete();
		return Redirect::to('admin/buses');
	}

	public function saveUser() {
		$confirm = Input::get('confirm');
		$type = Input::get('type');
		$user = User::find(Input::get('id'));
		$user->Regconfirm = $confirm;
		$user->Account_type = $type;
		$user->save();
		return Redirect::to('admin/users');
	}

	public function saveBus() {
		$status  = Input::get('status');
		$bus = Bus::find(Input::get('id'));
		$bus->status = $status;
		$bus->save();
		return Redirect::to('admin/buses');
	}

	public function saveRoute() {
		$amount = Input::get('amount');
		$departure = Input::get('departure');
		$time = Input::get('time');
		$route = BusRoute::find(Input::get('id'));
		$route->amount = $amount;
		$route->departure_date =  date("Y-m-d", strtotime($departure));
		$route->departure_time = $time;
		$route->save();

		return Redirect::to('admin/routes');
	}
}