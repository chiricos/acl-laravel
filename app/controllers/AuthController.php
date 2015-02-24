<?php
use Illuminate\Auth\UserInterface;
use cerverus\Repositories\UserRepo;
use cerverus\Repositories\LogRepo;
use cerverus\Entities\User;
use cerverus\Managers\UserManager;

class AuthController extends BaseController {


    public function signUp()
    {
        return View::make('front/sign-up');
    }

    public function login()
    {
        $data = Input::only('email', 'password', 'remember');
        $credentials = ['email' => $data['email'], 'password' => $data['password']];
         
        if (Auth::attempt($credentials, $data['remember'])) {
            return Redirect::to('/');
        }

        return Redirect::to('login')
            ->with('mensaje_error', 'Tu correo o contraseña son incorrectos')
            ->withInput();
    }

    public function logOut()
    {
        Auth::logout();
        return Redirect::to('login')
            ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }

    public function showRestore()
    {
        return View::make('back.restorePassword');
    }

    public function sendRestore()
    {
        $userRepo= new UserRepo();
        $validator=$userRepo->passwordRestart(Input::get('email'));
        $data=['link'=>$validator['link']];
        if($validator['return'])
        {
            Mail::send('emails.password', $data, function ($message) {
                $message->to(Input::get('email'), 'cerverus')->subject('correo de restauracion de su password');
            });
        }else{
            return Redirect::to('restaurar')->with('mensaje_error','tu correo no se encuentra registrado')->withInput();
        }
        return Redirect::to('login')->with('mensaje_error','El correo fue enviado con exito')->withInput();
       /* new LogRepo(
            [
                'responsible'=> $validator['username'],
                'action' => 'ha solicitado restaurar la contraseña',
                'affected_entity' => '',
                'method' => 'password'
            ]
        );*/
    }

    public function restorePassword($restore_password)
    {
        $userRepo = new UserRepo();
        $validator = $userRepo->validatorUser($restore_password);
        if($validator)
        {
            $user=['id'=>$restore_password];
            return View::make('front.restorePassword',compact('user'));
        }
        return Redirect::route('home');
    }

    public function changePassword($restore_password)
    {
        $dataUser =  Input::all();
        $userManager= new UserManager(new User(),$dataUser);
        $userValidation = $userManager->isValid();

        if ($userValidation) {
            return Redirect::to('restaurarContraseña/'.$restore_password)->withErrors($userValidation)->withInput();
        }

        $userName=$userManager->savePassword($restore_password);

        /*new LogRepo(
            [
                'responsible'=> $userName,
                'action' => 'restauro la contraseña',
                'affected_entity' => '',
                'method' => 'savePassword'
            ]
        );*/

        return Redirect::route('login')->with(array('mensaje' => 'El usuario ha sido creado correctamente.'));
    }



}