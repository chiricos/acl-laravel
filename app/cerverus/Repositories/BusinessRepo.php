<?php

namespace cerverus\Repositories;

use cerverus\Entities\Business;

class BusinessRepo extends BaseRepo
{

    protected function getModel()
    {
        return new Business();
    }



    public function getState($type,$state)
    {
        if($type==1)
        {
            if($state==1)
            {
                return "Activo";
            }
            if($state==2)
            {
                return "Mensual";
            }
            if($state==3)
            {
                return "Moroso";
            }
            if($state==4)
            {
                return "Eliminado";
            }

        }else{
            if($state==1)
            {
                return "Cotizacion ordinaria y anexo";
            }
            if($state==2)
            {
                return 'Portafolio y propuesta';
            }
            if($state==3)
            {
                return 'Primera llamada';
            }
            if($state==4)
            {
                return 'Cotizacion especifica';
            }
            if($state==5)
            {
                return 'Segunda llamada';
            }
            if($state==6)
            {
                return 'Negociacion';
            }
        }

    }

    public function saveState($type,$state,$date,$id)
    {
        $business=Business::find($id);
        if($type==2)
        {
            if($state==1)
            {
                if($date["state_one"]!="")
                {
                    $business->state=2;
                    $business->save();
                }
            }
            if($state==2)
            {
                if($date["state_two"]!="")
                {
                    $business->state=3;
                    $business->save();
                }
            }
            if($state==3)
            {
                if($date["state_three"]!="")
                {
                    $business->state=4;
                    $business->save();
                }
            }
            if($state==4)
            {
                if($date["state_four"]!="")
                {
                    $business->state=5;
                    $business->save();
                }
            }
            if($state==5)
            {
                if($date["state_five"]!="")
                {
                    $business->state=6;
                    $business->save();
                }
            }
            if($state==6)
            {
                if($date["state_six"]!="")
                {
                    $business->state=1;
                    $business->type=1;
                    $business->save();
                }
            }
        }
    }


}