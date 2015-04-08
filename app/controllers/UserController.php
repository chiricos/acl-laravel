<?php

use cerverus\Entities\User;
use cerverus\Entities\Business;
use cerverus\Entities\Log;
use cerverus\Managers\CreateUserManager;
use cerverus\Managers\UpdateUserManager;
use cerverus\Managers\UpdateProfileManager;
use cerverus\Managers\UserManager;
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
        if(Auth::user()->role_id==1)
        {
            $charges= [ 'seleccione un role'=> "seleccione un role"]
                +[ 3 => "vendedor"]
                +[ 2 => "administrador"]
                +[ 1 => "super administrador"];
            $managers = [ "0" => "selecione un encargado"]
                +User::whereRaw('role_id=2')->lists('user_name','id');
        }
        if(Auth::user()->role_id==2)
        {
            $charges= [ 'seleccione un role'=> "seleccione un role"]
                +[ 3 => "vendedor"];
            $managers = [ "0" => "selecione un encargado"]
                +["".Auth::user()->id.""=>"".Auth::user()->user_name.""];
        }
        if(Auth::user()->role_id==3)
        {
            $charges= [ 'seleccione un role'=> "seleccione un role"];
            $managers = [ "0" => "selecione un encargado"];
        }


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

    public function updateUser($id)
    {
        if($id!=Auth::user()->id)
        {
            $message="";
            $user=User::find($id);
            if(Input::get('role_id')!=$user->role_id)
            {
                if($user->role_id==2 )
                {
                    $sell=User::where('manager','=',$id)->first();
                    if($sell)
                    {
                        $message='no puede cambiar de role, ya tiene vendedores a su cargo';
                    }
                }
                if($user->role_id==3 ){
                    $business=Business::where('manager','=',$id)->first();
                    if($business){
                        $message='no puede cambiar de role, ya tiene empresas a su cargo';
                    }
                }
            }
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
            if($userValidator or $manager!="" or $message)
            {
                return Redirect::route('updateUser',$id)->with('message_error',$message)->with('manager', $manager)->withErrors($userValidator)->withInput();
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
            return Redirect::route('administrator')->with('message_error','el usuario no fue actualizado exitosamente');
        }
        return Redirect::route('administrator')->with('message_error','el usuario no fue actualizado por que no puede modifcar su cuenta');

    }

    public function deleteUser($id)
    {
        if($id!=Auth::user()->id)
        {
            $business=Business::where('manager','=',$id)->first();
            $manager=User::where('manager','=',$id)->first();
            if(isset($business->id) or isset($manager->id))
            {
                return Redirect::route('administrator')->with('message_error','el usuario no fue eliminado exitosamente por que tiene vendedores a su cargo');
            }else{

                if(User::find($id)->delete())
                {
                    new LogRepo(
                        [
                            'responsible'=> Auth::user()->user_name,
                            'responsible_id'=> Auth::user()->id,
                            'action' => 'ha eliminado una cuenta ',
                            'affected_entity'=> '',
                            'affected_entity_id'=> $id,
                        ]
                    );
                    return Redirect::route('administrator')->with('message','el usuario fue eliminado exitosamente');
                }
            }
        }

        return Redirect::route('administrator')->with('message_error','el usuario no puede eliminar su propia cuenta');

    }

    public function showUser($id)
    {
        $user=User::find($id);
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $logs=Log::where('responsible_id','=',$id)->get();
        $business=Business::where('manager','=',$user->id)->get();
        return View::make('front.accounts.show',compact('total','business','user','logs'));
    }

    public function showProfile()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $user=User::find(Auth::user()->id);
        $manager=User::where('id','=',$user->manager)->first();
        $logs=Log::where('responsible_id','=',$user->id)->get();
        return View::make('front.accounts.profile',compact('user','manager','logs','total'));
    }

    public function updateProfile()
    {
        $user=User::find(Auth::user()->id);
        $updateProfile=new UpdateProfileManager($user,Input::all());
        $updateValidator=$updateProfile->isValid();
        if($updateValidator)
        {
            return Redirect::route('profile')->with('upload','1')->withErrors($updateValidator)->withInput();
        }

        $updateUser=$updateProfile->updateUser();
        if($updateUser)
        {
            new LogRepo(
                [
                    'responsible'=> Auth::user()->user_name,
                    'responsible_id'=> Auth::user()->id,
                    'action' => 'ha actualizado sus datos ',
                    'affected_entity'=> '',
                    'affected_entity_id'=> '',
                ]
            );
            return Redirect::route('profile')->with('message','sus datos fueron actualizados exitosamente');
        }
        return Redirect::route('profile')->with('message_error','sus datos no puedieron se actualizados');

    }

    public function changePassword()
    {
        $dataUser =  Input::all();
        $userManager= new UserManager(new User(),$dataUser);
        $userValidation = $userManager->isValid();
        if ($userValidation) {
            return Redirect::route('profile')->with('password','1')->withErrors($userValidation);
        }

        $userManager->savePassword(Auth::user()->id,1);
        new LogRepo(
            [
                'responsible'=> Auth::user()->user_name,
                'responsible_id'=> Auth::user()->id,
                'action' => 'ha restaurado la contraseña su contraseña',
            ]
        );

        return Redirect::route('profile')->with(array('message' => 'Has cambiado la contraseña exitosamente'));
    }

    public function showSend()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        return View::make('back.contactAs',compact('total'));
    }

    public function sendContact()
    {
        $data=Input::all()
            +['name'=>Auth::user()->name]
            +['user_name'=>Auth::user()->user_name]
            +['email'=>Auth::user()->email]
            +['about'=>Input::get('about')]
            +['text'=>Input::get('message')]
            +['link'=>Auth::user()->id];
        if(Auth::user()->role_id==3)
        {
            $manager=User::find(Auth::user()->manager);
            $email=$manager->email;
            Mail::send('emails.contactAs', $data, function ($message) use ($email) {
                $message->to($email, 'cerveruss CRM')->subject('correo de '.Auth::user()->user_name.'');
            });
            return Redirect::route('contactAs')->with('message','El correo se envio correctamente al Administrador a su cargo');
        }
        if(Auth::user()->role_id==2)
        {
            $users=User::where('role_id','=',1)->get();
            foreach($users as $user)
            {
                $email=$user->email;
                Mail::send('emails.contactAs', $data, function ($message) use ($email) {
                    $message->to($email, 'cerveruss CRM')->subject('correo de '.Auth::user()->user_name.'');
                });
                return Redirect::route('contactAs')->with('message','El correo se envio correctamente a los super administradores');
            }
        }
        return Redirect::route('contactAs')->with('message_error','el Super Administrador no puede enviar correos');
    }
}