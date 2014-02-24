<?php

class UserController extends BaseController {

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
	private $_apiContext;
    private $_ClientId='AZZISBAGJBtFuDbxP5Wysb2MWDaKBw39-mJp0vfNSenb-sWLRIH3TReegmyu';
    private $_ClientSecret='EPYFCxAwVnh-l8edNT3iWVTg7N4lrEVf1OyjsbCHGEVVewNbyb3bMKGCrNLJ';

    public function __construct(){

        // ### Api Context
        // Pass in a `ApiContext` object to authenticate 
        // the call. You can also send a unique request id 
        // (that ensures idempotency). The SDK generates
        // a request id if you do not pass one explicitly. 


        $this->_apiContext = Paypalpayment:: ApiContext(
                Paypalpayment::OAuthTokenCredential(
                    $this->_ClientId,
                    $this->_ClientSecret
                )
        );

        // dynamic configuration instead of using sdk_config.ini

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => __DIR__.'/../PayPal.log',
            'log.LogLevel' => 'FINE'
        ));

    }


	public function showUserIndex()
	{	
		$data = null;
		$bus=Bus::where('status','=','WAITING')->get();
		$route = BusRoute::all();
		$counter = 0;

		foreach($bus as $b) {
			$r = BusRoute::find($b->busid);
			$b->route = $r;
			$data[$counter++] = $b;
		}

		return View::make('user.userIndex',array("title"=>"Five Star Bus Reservation","data"=>$data, "date"=>"false", "location"=>"false"));
	}

	public function showPayment()
	{	
		
		$myReservation=BusReservations::where('user_id','=',Auth::user()->user_id)
		->where('status','=','RESERVED')
		->paginate(5);

		return View::make('user.userPayOnline',array("title"=>"My Reservation","data"=>$myReservation));

	}

	public function showMyReservation()
	{		
		$myReservation=BusReservations::where('user_id','=',Auth::user()->user_id)->where('status', '=', 'RESERVED')->paginate(10);

		
		return View::make('user.userMyReservation',array("title"=>"My Reservation","data"=>$myReservation));

	}

	

	public function showPaymentSuccess(){
		BusReservations::where('');
	}

	public function showCancels()
	{	
			$myReservation=BusReservations::where('user_id','=',Auth::user()->user_id)->where('status', '=', 'CANCEL')->paginate(10);

		
		return View::make('user.userMyReservation',array("title"=>"My Reservation","data"=>$myReservation));

	}


	public function showSearch()
	{	$buses=Bus::where('status','=','WAITING')->get();
		$to=Input::get('to');
		$from = Input::get('from');
		$return = date("Y-m-d", strtotime(Input::get('ReturnDate')));
		$depart = date("Y-m-d", strtotime(Input::get('DepartureDate')));
		$type = Input::get('tripType');

		// $dates = array('returnDate'=>Input::get('ReturnDate'), 'departureDate'=>Input::get('DepartureDate'));
		// $rules = array('errorReturn'=>'required', 'errorDpt'=>'required');
		// $validation = Validator::make($dates, $rules);
		// if($validation->fails()) {
		// 	return Redirect::back()->withErrors($validation)->withInput();
		// }
		$counter=0;
	    $containe;
	    $bus_container=null;
		$busroute = BusRoute::where('leaving_from', '=', $from)->get();
		
		
		if($type=='onewayTrip') {
			foreach($buses as $bus) {
				$container[$counter] = Bus::find($bus->busid)->busRoute()
				->where('leaving_from','=',$from)->where('going_to','=',$to)
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
		} else if($type=='roundTrip') {
			foreach($buses as $bus) {
				$container[$counter] = Bus::find($bus->busid)->busRoute()
				->where('leaving_from','=',$from)->where('going_to','=',$to)
				->where('departure_date','=',$depart)->first();
				if($container[$counter]==null){
					unset($container[$counter]);
				}	
				$counter++;	
			}			
			foreach($buses as $bus) {
				$container[$counter] = Bus::find($bus->busid)->busRoute()
				->where('leaving_from','=',$to)->where('going_to','=',$from)
				->where('departure_date','=',$return)->first();
				if($container[$counter]==null){
					unset($container[$counter]);
				}	
				$counter++;	
			}
			$counter = 0;
			foreach ($container as $key=>$value) {
		
				$bus_container[$counter++]=Bus::find($value->busid);
			}
		}


		if(Auth::check()){
			return View::make('user.userIndex',array("title"=>"Results","data"=>$bus_container,"date"=>"true","location"=>"false"));
		} else {
			return View::make('pages.results',array( "title"=>"Results","data"=>$bus_container,"date"=>"true","location"=>"false"));
		}
	}

	public function showSearchLocation()
	{	$buses=Bus::where('status','=','WAITING')
	    ->get();
	    
	    $counter=0;
	    $containe;
	    $bus_container=null;

		$r = BusRoute::where('leaving_from','=',Input::get('from'))->where('going_to', '=', Input::get('to'))->get();
		foreach($r as $r1) {
			$b = Bus::find($r1->busid);
			$b->route = $r1;
			$bus_container[$counter++] = $b;
		}

		if(Auth::check()){
			return View::make('user.userIndex',array("title"=>"Results","data"=>$bus_container,"date"=>"false","location"=>"true"));
		} else {
			return View::make('pages.results',array("title"=>"Results","data"=>$bus_container,"date"=>"false","location"=>"true"));
		}
		
	}

	public function postPayOnline(){
		$busreservationid=array('reservid'=>Input::get('busresvid'),
			'pay'=>Input::get('pay'));
			
					

			$data=Ticket::find(BusReservations::find($busreservationid['reservid'])->ticketno);
			$ticket_no=Input::get('ticketno');
			$departure_date=Input::get('departure_date');

        // ### Payer
        // A resource representing a Payer that funds a payment

        $payer = Paypalpayment::Payer();
        $payer->setPayment_method("paypal");

      

        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types
   	  

		$item = Paypalpayment::Item();
		$item->setName('Bus Reservation Ticket-'.$ticket_no);
		$item->setCurrency('PHP');
		$item->setQuantity(1);
		$item->setPrice($data->amount);

			// ### Additional payment details
		// Use this optional field to set additional
		// payment information such as tax, shipping
		// charges etc.
		$details = Paypalpayment::Details();
	
		$details->setSubtotal($data->amount);

		  // ### Amount
        // Let's you specify a payment amount.
       

		$amount = Paypalpayment::Amount();
        $amount->setCurrency("PHP");
        $amount->setTotal($data->amount);
        $amount->setDetails($details);

		$itemList = Paypalpayment:: ItemList();
		$itemList->setItems(array($item));


        $transaction = Paypalpayment::Transaction();
       
       	$transaction->setAmount($amount);
        $transaction->setItemList($itemList);
        $transaction->setDescription("This is the payment description.");

        // ### Redirect urls
        // Set the urls that the buyer must be redirected to after 
        // payment approval/ cancellation.
        $baseUrl = URL::to('/');
        $redirectUrls = Paypalpayment::RedirectUrls();
        $redirectUrls->setReturn_url("$baseUrl/payment/executepaymentsuccess");
        $redirectUrls->setCancel_url("$baseUrl/executepaymentcancel");

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent as 'sale'
        $payment = Paypalpayment::Payment();
        $payment->setIntent("sale");
        $payment->setPayer($payer);
        $payment->setRedirect_urls($redirectUrls);
        $payment->setTransactions(array($transaction));

        // ### Api Context
        // Pass in a `ApiContext` object to authenticate 
        // the call and to send a unique request id 
        // (that ensures idempotency). The SDK generates
        // a request id if you do not pass one explicitly. 
     

        // ### Create Payment
        // Create a payment by posting to the APIService
        // using a valid apiContext
        // The return object contains the status and the
        // url to which the buyer must be redirected to
        // for payment approval

        try {
            $payment->create($this->_apiContext);
        } catch (\PPConnectionException $ex) {
            echo "Exception: " . $ex->getMessage() . PHP_EOL;
            var_dump($ex->getData());    
            return exit(1);
        }


        // ### Redirect buyer to paypal
        // Retrieve buyer approval url from the `payment` object.
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirectUrl = $link->getHref();
            }
        }
        // It is not really a great idea to store the payment id
        // in the session. In a real world app, please store the
        // payment id in a database.
        //$_SESSION['paymentId'] = $payment->getId();
            if(isset($redirectUrl)) {
             return Redirect::to($redirectUrl)->with(array('ticket_no'=>$ticket_no));
               
            }

	}
	//
	    public function postCancelReservation(){

	    	if(Input::get('cancel')=='true'){
	    		BusReservations::where('bus_resvid','=',Input::get('busresvid'))
	    		->update(array('status'=>'CANCEL'));
	    		$seat=BusReservations::find(Input::get('busresvid'));
	    		$bus=Bus::find($seat->busid);
	    		Bus::where('busid','=',$bus->busid)
	    		->update(array('availableseats'=>$bus->availableseats+1));
	    		$Ticketid=BusReservations::where('bus_resvid','=',Input::get('busresvid'))
	    		->first();
	    		Ticket::where('ticketno','=',$Ticketid->ticketno)
	    		->update(array('status'=>'CANCEL'
	    		
	    			));
	    	    return Redirect::back()->with('cancel','The Reservation was cancelled');

	    	}
	    	else{
	    		return Redirect::back();

	    	}
	    }

		public function postReserved(){
			if(Auth::check()) {
				$reservedSeats=Session::get('seats');
			$reserved=array('busid'=>Session::get('busid'),
				'seatno'=>null,
				'ticketno'=>null,
				'user_id'=>Auth::user()->user_id,
				'status'=>'RESERVED',
				'route_id'=>Session::get('routeid'),
				);
			foreach ($reservedSeats as $key) {
				$temp=explode('-',$key);
				$reserved['seatno']=$temp[1];
				$reserved['ticketno']=$temp[0];

				BusReservations::create($reserved);

				$ticket=Ticket::find($temp[0]);
				$ticket->status='RESERVED';
				$ticket->date=date('Y-m-d');
				$ticket->route_id=$reserved['route_id'];
				$ticket->amount=BusRoute::find($reserved['route_id'])->first()->amount;
				$ticket->save();
				$Bus=Bus::find($reserved['busid']);
				if($Bus->availableseats-1<=0){
						$Bus->status='CLOSED';
						$Bus->availableseats=$Bus->availableseats-1;
						$Bus->save();
				}
				else{
						$Bus->availableseats=$Bus->availableseats-1;
						$Bus->save();
				}
			}
			return Redirect::to('payOnline');
				
			} else{
			return Redirect::back()->with('notLogin', "You must be a registered user in order to reserve a seat. ");
		}
			
		}
	


}