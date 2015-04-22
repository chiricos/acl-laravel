<?php

use cerverus\Entities\Business;


class ReportController extends BaseController
{

    public function show()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $business=Business::where('state','=',1)->get();
        $client=Business::where('state','=',2)->get();
        return View::make('front.reports.chart',compact('total','business','client'));
    }


}
