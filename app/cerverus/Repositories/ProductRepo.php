<?php

namespace cerverus\Repositories;

use cerverus\Entities\User;

class ProductRepo extends BaseRepo
{

    protected function getModel()
    {
        return new User();
    }

    public function getServices()
    {
        return [''=>'seleccione un servicio']
        +['1'=>'BRANDING']
        +['2'=>'WEB Y APPS']
        +['3'=>'MARKETING']
        +['4'=>'PRODUCCIÓN AUDIOVISUAL']
        +['5'=>'ESTRATEGIA']
        +['6'=>'IMPRESION'];
    }
}