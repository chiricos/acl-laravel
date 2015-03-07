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


}