<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// Cron::add('UpdateBusScheduling', '* * * * *', function() {
//                     // Do some crazy things successfully every minute
//                    $BusReservations=BusReservations::where('status','=','RESERVED')
//                    ->get();

//                 });

// 		Cron::setEnableJob('UpdateBusScheduling');
// 		// One job will be called
// 		$report = Cron::run();



Route::get('/',array("uses"=>"HomeController@showIndex"));
Route::post('login',array("uses"=>"HomeController@postLogin"));
Route::post('register', array("uses"=>"RegistrationController@postRegistration"));

Route::get('logout',array("uses"=>"HomeController@showLogout"));
Route::get('filter',array("uses"=>"HomeController@showFilter"));
Route::get('reservation',array("uses"=>"UserController@showUserIndex"));
Route::get('search',array("uses"=>"UserController@showSearch"));
Route::get('searchLocation',array("uses"=>"UserController@showSearchLocation"));
Route::get('payOnline',array("uses"=>"UserController@showPayment"));
Route::get('myReservation',array("uses"=>"UserController@showMyReservation"));
Route::get('home',array("uses"=>"UserController@showMyHome"));
Route::get('myCancels',array("uses"=>"UserController@showCancels"));
Route::get('reservedseats',array("uses"=>"UserController@postReserved"));	
Route::post('CancelReservation',array("uses"=>"UserController@postCancelReservation"));
Route::post('PaypalOnline',array("uses"=>"UserController@postPayOnline"));
Route::get('payment/executepaymentsuccess',array("uses"=>"UserController@showPaymentSuccess"));


Route::get('farematrix',array('uses'=>'HomeController@showFareMatrix'));
Route::get('location',function(){return View::make('pages.location', array("title"=>"Location"));});
Route::get('contact_us',function(){return View::make('pages.contact', array("title"=>"Contact Us"));});
Route::post('terms',function(){return View::make('pages.terms', array("title"=>"Terms and conditions"));});
Route::post('contact', array('uses'=>'UserController@contactUs'));
Route::get('registration',function(){return View::make('pages.register', array("title"=>"Five Star Bus Reservation"));});
Route::get('admin/login',function(){return View::make('admin.login', array("title"=>"Admin - Five Star Bus Reservation"));});
Route::post('admin/login',array('uses'=>'AdminController@postLogin'));
Route::get('schedules',array("uses"=>"HomeController@showSchedule"));

Route::group(array('before'=>'adminAuth'),function(){
	Route::get('admin/page',function(){return View::make('admin.page', array("title"=>"Five Star Bus Reservation"));});
	Route::get('admin/addbus',function(){return View::make('admin.addbus', array("title"=>"Add Bus"));});
	Route::post('admin/UpdateBusStatus',array('uses'=>'AdminController@updateBus'));
	Route::post('admin/AddBus',array('uses'=>'AdminController@postAddBus'));
	Route::post('admin/removeBus',array('uses'=>'AdminController@removeBus'));
	Route::post('admin/addRoute', array('uses'=>'AdminController@addRoute'));
	Route::get('admin/editRoute',array('uses'=>'AdminController@showEditRoute'));
	Route::get('admin/panel',array('uses'=>'AdminController@showPanel'));



});
Route::get('/{id}',array("as"=>"emailConf",function($id){
	$var=User::find($id);

	if($var->Regconfirm==0){
		DB::table('users')->where('user_id','=',$id)->update(array('Regconfirm'=>1));
		return View::make('pages.index',array("title"=>"Five Star Bus  Reservation", "data"=>true));
	}
	else{

	}		return View::make('pages.index',array("title"=>"Five Star Bus  Reservation", "data"=>false));
}));