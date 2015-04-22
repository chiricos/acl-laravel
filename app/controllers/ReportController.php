<?php

use cerverus\Entities\Business;
use cerverus\Entities\User;
use Carbon\Carbon;


class ReportController extends BaseController
{

    public function show()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $business=Business::where('type','=',1)->get();
        $client=Business::where('type','=',2)->get();
        $recurrent=0;
        foreach($client as $dates)
        {
            $more=$this->date($dates->created_at);
            if($more)
            {
                $recurrent++;
            }
        }
        $users=User::where('role_id','=',3)->get();
        foreach($users as $user)
        {
            $user->role_id=count(Business::where('manager','=',$user->id)->get());
        }
        return View::make('front.reports.chart',compact('total','business','client','recurrent','users'));
    }


    public function date($date)
    {
        $recurrent = new Carbon($date);
        if($recurrent->diffInMonths()>=3)
        {
            return true;
        }
        return false;

        //echo $date->timespan();  // zondag 28 april 2013 21:58:16
    }

}
