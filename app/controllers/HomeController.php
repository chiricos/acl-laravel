<?php

use cerverus\Entities\Business;
use cerverus\Entities\Payment;
use Carbon\Carbon;

class HomeController extends BaseController
{

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

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index()
	{
		$permiso =new Proceso();
		$total=$permiso->filtrarPermisos();
		$business=Payment::where('first_payment','<=',new DateTime('today'))->get();
		return View::make('front.home',compact('total'));
	}

	public function date($date)
	{
		$created = new Carbon($date);
		$now = Carbon::now();
		$difference = ($created->diff($now)->days < 1)
			? 'today'
			: $created->diffForHumans($now);
		$dates=explode(" ",$difference);
		if(count($dates)>1)
		{
			if($dates[1]=="month" or $dates[1]=="months" )
			{
				if($dates[0]>=1)
				{
					return true;
				}
			}else{
				return false;
			}
		}
		return false;
		//echo $date->timespan();  // zondag 28 april 2013 21:58:16
	}

}
