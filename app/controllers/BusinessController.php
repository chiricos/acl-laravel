<?php

use cerverus\Entities\Business;
use cerverus\Entities\User;
use cerverus\Managers\BusinessManager;
use cerverus\Managers\UpdateBusinessManager;
use cerverus\Repositories\UserRepo;
use cerverus\Repositories\LogRepo;

class BusinessController extends BaseController
{
    public function showBusiness()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $business=Business::all();
        $users=User::all();
        $userRepo=new UserRepo();
        $managers=$userRepo->getManager(Auth::user()->id,Auth::user()->role_id,Auth::user()->user_name);
        $state=$userRepo->getState();
        $states=$userRepo->getStates();
        return View::make('front.business.showBusiness',compact('business','total','managers','state','states','users'));

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

    public function showUpdateBusiness($id)
    {
        $updateBusiness=Business::find($id);
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $business=Business::all();
        $users=User::all();
        $userRepo=new UserRepo();
        $managers=$userRepo->getManager(Auth::user()->id,Auth::user()->role_id,Auth::user()->user_name);
        $state=$userRepo->getState();
        $states=$userRepo->getStates();
        return View::make('front.business.updateBusiness',compact('business','total','managers','state','states','users','updateBusiness'));
    }

    public function updateBusiness($id)
    {
        $business=Business::find($id);
        $businessManager=new UpdateBusinessManager($business,Input::all());
        $businessValidator=$businessManager->isValid();
        if($businessValidator)
        {
            return Redirect::to('admin/actualizarEmpresa/'.$id)->withErrors($businessValidator)->withInput();
        }
        $upload=$businessManager->updateBusiness();
        if($upload)
        {
            new LogRepo(
                [
                    'responsible'=> Auth::user()->user_name,
                    'responsible_id'=> Auth::user()->id,
                    'action' => 'ha actualizado un '.$upload,
                    'affected_entity'=> Input::get('name'),
                ]
            );
            return Redirect::route('business')->with('message','el '.$upload.' se actualizo correctamente');
        }
            return Redirect::route('buesiness')->with('message_error','el '.$upload.' no se pudo actualizar correctamente ');
    }
}