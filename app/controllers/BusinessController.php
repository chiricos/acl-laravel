<?php

use cerverus\Entities\Business;
use cerverus\Managers\BusinessManager;
use cerverus\Repositories\UserRepo;
use cerverus\Repositories\LogRepo;

class BusinessController extends BaseController
{
    public function showBusiness()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $business=Business::all();
        $userRepo=new UserRepo();
        $managers=$userRepo->getManager(Auth::user()->id,Auth::user()->role_id,Auth::user()->user_name);
        $state=['seleccione un estado'=>'seleccione un estado']
            +['1'=>'Activo']
            +['2'=>'Mensual']
            +['3'=>'Moroso']
            +['4'=>'Eliminado'];
        $states=['seleccione un estado'=>'seleccione un estado']
            +['1'=>'Cotizacion ordinaria y anexo']
            +['2'=>'Portafolio y propuesta']
            +['3'=>'Primera llamada']
            +['4'=>'Cotizacion especifica']
            +['5'=>'Segunda llamada']
            +['6'=>'Negociacion'];
        return View::make('front.business.showBusiness',compact('business','total','managers','state','states'));

    }

    public function saveBusiness()
    {

        $businessManager=new BusinessManager(new Business(),Input::all());
        $businessValidator=$businessManager->isValid();
        if($businessValidator)
        {
            return Redirect::route('business')->with('type', Input::get('type'))->withErrors($businessValidator)->withInput();
        }
        $businessName=$businessManager->saveBusiness();
        if($businessName){
            new LogRepo(
                [
                    'responsible'=> Auth::user()->user_name,
                    'responsible_id'=> Auth::user()->id,
                    'action' => 'ha creado un '.$businessName,
                    'affected_entity'=> Input::get('name'),
                ]
            );
            return Redirect::route('business')->with('message','el '.$businessName.' fue creado exitosamente');
        }
        return Redirect::route('business')->with('message_error','el '.$businessName.' no pudo ser creado');
    }
}