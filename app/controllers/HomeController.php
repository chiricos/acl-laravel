<?php

use cerverus\Entities\Business;
use cerverus\Entities\Product;
use cerverus\Entities\BusinessProduct;
use cerverus\Entities\Payment;
use Carbon\Carbon;

class HomeController extends BaseController
{

	public function all()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $payments=Payment::paginate(5);
        $businessProducts=BusinessProduct::all();
        $business=Business::all();
        $products=Product::all();
        return View::make('front.homeAll',compact('total','payments','businessProducts','business','products'));
    }

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index()
	{
		$permiso =new Proceso();
		$total=$permiso->filtrarPermisos();
        
            $payments=Payment::all();
            $businessProducts=BusinessProduct::all();
            $business=Business::all();
            $products=Product::all();


		foreach($payments as $payment)
		{
			if($this->dateState($payment->payment))
			{
				$businessProduct=BusinessProduct::find($payment->businessProduct_id);
				$client=Business::find($businessProduct->business_id);
				$client->state=3;
				$client->update();
			}
			if($this->date($payment->payment))
			{
				if($payment->validator==1)
				{
					$payment->type=0;
				}
			}else{
				$payment->type=0;

			}

		}

		return View::make('front.home',compact('total','payments','business','businessProducts','products'));
	}

	public function date($date)
	{
		$payment = new Carbon($date);

		if($payment->diffInDays()<=5)
		{

			return true;
		}

		return false;

		//echo $date->timespan();  // zondag 28 april 2013 21:58:16
	}

	public function dateState($date)
	{
		$payment= new Carbon($date);
		$now=Carbon::now();
		$difference = ($payment->diff($now)->days < 1)
			? 'today'
			: $payment->diffForHumans($now);

		$dates=explode(" ",$difference);
		if(count($dates)==1)
		{
			return true;
		}else{
			if($dates[2]=="before")
			{
				return true;
			}
			return false;
		}
		return false;

	}

	public function email()
	{
		$data = ["link" => 1];
		$emails=array(array('mail'=>'edwarddiaz92@gmail.com'),array('mail'=>'drawderiah@gmail.com'));
		foreach($emails as $email)
		{
			$correo=$email["mail"];
			Mail::send('emails.auth.reminder', $data, function ($message) use ($correo) {
				$message->to($correo, 'creditos lilipink')->subject('su solicitud de credito esta siendo procesada');
			});
		}


	}

}
