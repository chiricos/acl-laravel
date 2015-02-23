<?php
use Illuminate\Auth\UserInterface;
use cerverus\Repositories\UserRepo;
use cerverus\Repositories\LogRepo;
use cerverus\Managers\UserManager;
use cerverus\Entities\User;

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
            return Redirect::to('home');
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

    public function drawde()
    {
        dd("hola");
    }


}