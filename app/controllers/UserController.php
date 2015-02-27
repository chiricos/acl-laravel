<?php

use cerverus\Entities\User;
use cerverus\Managers\CreateUserManager;
use cerverus\Managers\UpdateUserManager;
use cerverus\Repositories\LogRepo;

class UserController extends BaseController
{
    public function showUsers()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $users=User::all();
        return View::make('front.accounts.users',compact('users','total'));
    }

    public function createUser()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $managers = [ "0" => "selecione un encargado"]
            +User::whereRaw('role_id=2')->lists('user_name','id');
        $charges= [ 'seleccione un role'=> "seleccione un role"]
            +[ 3 => "vendedor"]
            +[ 2 => "administrador"]
            +[ 1 => "super administrador"];
        return View::make('front.accounts.create',compact('managers','charges','total'));
    }

    public function saveUser()
    {
        $createUserManager=new CreateUserManager(new User(),Input::all());
        $createUserValidator=$createUserManager->isValid();
        $manager="";
        if(Input::get('role_id')==3)
        {
            if(Input::get('manager')==0)
            {
                $manager="seleccione un encargado";
            }
        }
        if($createUserValidator or $manager!="")
        {
            return Redirect::route('createUser')->with('manager', $manager)->withErrors($createUserValidator)->withInput();
        }
        $saveUser=$createUserManager->saveUser();
        if($saveUser)
        {
            new LogRepo(
                [
                    'responsible'=> Auth::user()->user_name,
                    'responsible_id'=> Auth::user()->id,
                    'action' => 'ha creado una cuenta ',
                    'affected_entity'=> Input::get('user_name'),
                ]
            );
            return Redirect::route('administrator')->with('message','el usuario fue creado exitosamente');
        }
        return Redirect::route('administrator')->with('message_error','el usuario no pudo ser creado');
    }

    public function showUpdateUser($id)
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $user=User::find($id);
        $managers = [ "0" => "selecione un encargado"]
            +User::whereRaw('role_id=2')->lists('user_name','id');
        if(Auth::user()->role_id==1){
            $charges= [ 'seleccione un role'=> "seleccione un role"]
                +[ 3 => "vendedor"]
                +[ 2 => "administrador"]
                +[ 1 => "super administrador"];
        }else{
            $charges= [ 'seleccione un role'=> "seleccione un role"]
                +[ 2 => "administrador"]
                +[ 3 => "vendedor"];
        }
        return View::make('front.accounts.update',compact('user','total','managers','charges'));
    }

    public function uploadUser($id)
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $user=User::find($id);
        $userUpdate=new UpdateUserManager($user,Input::all());
        $userValidator=$userUpdate->isValid();
        $manager="";
        if(Input::get('role_id')==3)
        {
            if(Input::get('manager')==0)
            {
                $manager="seleccione un encargado";
            }
        }
        if($userValidator or $manager!="")
        {
            return Redirect::route('updateUser',$id)->with('manager', $manager)->withErrors($userValidator)->withInput();
        }

        $updateUser=$userUpdate->updateUser($id);
        if($updateUser)
        {
            new LogRepo(
                [
                    'responsible'=> Auth::user()->user_name,
                    'responsible_id'=> Auth::user()->id,
                    'action' => 'ha actualizado una cuenta ',
                    'affected_entity'=> $user->user_name,
                    'affected_entity_id'=> $id,
                ]
            );
            return Redirect::route('administrator')->with('message','el usuario fue actualizado exitosamente');
        }
        return Redirect::route('administrator')->with('message','el usuario no fue actualizado exitosamente');
    }

    public function deleteUser($id)
    {
        $user=User::find($id);
        if($user->delete())
        {
            new LogRepo(
                [
                    'responsible'=> Auth::user()->user_name,
                    'responsible_id'=> Auth::user()->id,
                    'action' => 'ha eliminado una cuenta ',
                    'affected_entity'=> $user->user_name,
                    'affected_entity_id'=> $id,
                ]
            );
            return Redirect::route('administrator')->with('message','el usuario fue eliminado exitosamente');
        }
    }
}