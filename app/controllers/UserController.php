<?php

use cerverus\Entities\User;
use cerverus\Managers\CreateUserManager;
use cerverus\Repositories\LogRepo;

class UserController extends BaseController
{
    public function showUsers()
    {
        $users=User::all();
        return View::make('front.accounts.users',compact('users'));
    }

    public function createUser()
    {
        $managers = [ "0" => "selecione un encargado"]
            +User::whereRaw('role_id=2')->lists('user_name','id');
        $charges= [ 'seleccione un role'=> "seleccione un role"]
            +[ 3 => "vendedor"]
            +[ 2 => "administrador"]
            +[ 1 => "super administrador"];
        return View::make('front.accounts.create',compact('managers','charges'));
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
        if($createUserValidator)
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
}