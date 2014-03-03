<?php

class HomeController extends BaseController {

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

	public function showIndex()
	{
		

	

		return View::make('pages.index',array("title"=>"Five Star Bus  Reservation", "data"=>false));
	}



	public function postLogin(){
			$user=array('Email'=>Input::get('email'),
				'password'=>Input::get('password'));
			$rules=array('Email'=>'required|Email','password'=>'required');
			$validation=Validator::make($user,$rules);
			if($validation->fails()){
				return Redirect::back()->withErrors($validation)->withInput();
			}
			if(Auth::attempt($user)){
				if(Auth::user()->Regconfirm==0) {
					Auth::logout();
					return Redirect::back()->with('notConfirmed', "Email confirmation required.");
				} else {
					return Redirect::intended('terms');
				}
				
			}
			$isNull=User::where('Email','=',$user['Email'])->first();
			$messages=($isNull==null) ? 'The email you entered does not belong to any account.' : 'The password you entered is incorrect. Please try again (make sure your caps lock is off).';

			return Redirect::back()->with('warning',$messages)->withInput();


	}
	public function showFareMatrix() {
		$f1 = BusRoute::where('route_id','<','13')->get()->sortBy('going_to');
		$f2 = BusRoute::where('route_id','>','12')->where('route_id', '<', '19')->get()->sortBy('going_to');

		return View::make('pages.farematrix', array("fare1"=>$f1, "fare2"=>$f2, "title"=>"Fare Matrix"));
	}
	public function showLogout(){
		Auth::logout();
		return Redirect::to('/');
	}
	public function showContactus()
	{
		
	}
	public function showSchedule()
	{$data = null;
		$bus=Bus::where('status','=','WAITING')->get();
		$route = BusRoute::all();
		$counter = 0;

		foreach($bus as $b) {
			$r = BusRoute::find($b->busid);
			$b->route = $r;
			$data[$counter++] = $b;
		}

		return View::make('pages.schedules',array("title"=>"Five Star Bus Reservation","data"=>$data));
	}
	public function showLocation()
	{

	}

	public function showFilter() {
		$filter = Input::get('filter');
		$counter=0;
	    $containe;
	    $bus_container=null;
		$buses = Bus::where('status', '=', 'WAITING')->get();
		if($filter == "1") {
			$depart = date("Y-m-d", strtotime(Input::get('filter_departure_date')));
			
	    	$busroute = BusRoute::where('departure_date', '=', $depart)->get();
	    	foreach($buses as $bus) {
				$container[$counter] = Bus::find($bus->busid)->busRoute()
				->where('departure_date','=',$depart)->first();
				if($container[$counter]==null){
					unset($container[$counter]);
				}	
				$counter++;	
			}
			$counter = 0;
			foreach ($container as $key=>$value) {
				$bus_container[$counter++]=Bus::find($value->busid);
			}
			return View::make('pages.results',array( "title"=>"Results","data"=>$bus_container,"date"=>"true","location"=>"false"));
		} elseif ($filter == "2") {
			$destination = Input::get('filter_from');
	    	$busroute = BusRoute::where('going_to', '=', $destination)->get();
	    	foreach($buses as $bus) {
				$container[$counter] = Bus::find($bus->busid)->busRoute()
				->where('going_to','=',$destination)->first();
				if($container[$counter]==null){
					unset($container[$counter]);
				}	
				$counter++;	
			}
			$counter = 0;
			foreach ($container as $key=>$value) {
				$bus_container[$counter++]=Bus::find($value->busid);
			}
			return View::make('pages.results',array( "title"=>"Results","data"=>$bus_container,"date"=>"true","location"=>"false"));
		} elseif ($filter == "Origin") {

		} else {
			return Redirect::to('/')->with('noBus', $filter);
		}
	}



}