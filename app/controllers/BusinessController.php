<?php

use cerverus\Entities\Business;
use cerverus\Entities\User;
use cerverus\Entities\Contact;
use cerverus\Entities\Charge;
use cerverus\Managers\BusinessManager;
use cerverus\Managers\UpdateBusinessManager;
use cerverus\Repositories\UserRepo;
use cerverus\Repositories\BusinessRepo;
use cerverus\Repositories\LogRepo;
use cerverus\Repositories\RecordRepo;

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

    public function showSeeBusiness($id)
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $business=Business::find($id);
        $manager=User::find($business->manager)->first();
        $businessRepo=new BusinessRepo();
        $state=$businessRepo->getState($business->type,$business->state);
        $contacts=Contact::where('business_id', '=', $id)->get();
        $charges=Charge::all();
        return View::make('front.business.stateBusiness',compact('total','business','manager','state','contacts','charges'));
    }

    public function saveStates($id)
    {
        $business=Business::find($id);
        $business->record["state_one"]=Input::get("state_one");
        $business->record["state_two"]=Input::get("state_two");
        $business->record["state_three"]=Input::get("state_three");
        $business->record["state_four"]=Input::get("state_four");
        $business->record["state_five"]=Input::get("state_five");
        $business->record["state_six"]=Input::get("state_six");
        $business->record["state_seven"]=Input::get("state_seven");
        $business->record["state_eight"]=Input::get("state_eight");
        $business->record["state_nine"]=Input::get("state_nine");
        $business->record["state_ten"]=Input::get("state_ten");
        if($business->record->save())
        {
            $businessRepo=new BusinessRepo();
            $businessRepo->saveState($business->type,$business->state,Input::all(),$id);
            return Redirect::route('seeBusiness',$id)->with("message",'se guardo los estados correctamente');
        }else{
            return Redirect::route('seeBusiness',$id)->with("message_error",'no se guardo los estados correctamente');
        }

    }
}