<?php

use cerverus\Entities\Business;
use cerverus\Entities\User;
use cerverus\Entities\Product;
use cerverus\Entities\BusinessProduct;
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
        for($i=0;$i<count($users);$i++)
        {
            $users[$i]->count_business=count(Business::where('manager','=',$users[$i]->id)->get());
            if($users[$i]->count_business==0)
            {
                unset($users[$i]);
            }

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

    public function index()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $brandingTotal=0;
        $webTotal=0;
        $marketingTotal=0;
        $productionTotal=0;
        $strategyTotal=0;
        $printTotal=0;
        $branding=Product::where('dependency','=',1)->get();
        $web=Product::where('dependency','=',2)->get();
        $marketing=Product::where('dependency','=',3)->get();
        $production=Product::where('dependency','=',4)->get();
        $strategy=Product::where('dependency','=',5)->get();
        $print=Product::where('dependency','=',6)->get();
        $business=Business::all();
        foreach($branding as $brandingCount)
        {
            $brandingTotal=$brandingTotal+count($brandingCount['businessProduct']);
        }
        foreach($web as $webCount)
        {
            $webTotal=$webTotal+count($webCount['businessProduct']);
        }
        foreach($marketing as $marketingCount)
        {
            $marketingTotal=$marketingTotal+count($marketingCount['businessProduct']);
        }
        foreach($production as $productionCount)
        {
            $productionTotal=$productionTotal+count($productionCount['businessProduct']);
        }
        foreach($strategy as $strategyCount)
        {
            $strategyTotal=$strategyTotal+count($strategyCount['businessProduct']);
        }
        foreach($print as $printCount)
        {
            $printTotal=$printTotal+count($printCount['businessProduct']);
        }
        return View::make('front.reports.report',compact('business','total','branding','web','marketing','production','strategy','print','brandingTotal','webTotal','marketingTotal','productionTotal','strategyTotal','printTotal'));
    }

}
