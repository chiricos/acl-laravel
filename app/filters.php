<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});





include('include/filtros/Proceso.php');

if(Auth::user()){

    $permiso =new Proceso();
    $total=$permiso->filtrarPermisos();
    print_r($total);


    Route::filter('business', function(){
        if (Auth::guest()) return Redirect::guest('/');
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        if($total[1]<1){

            return Redirect::to('Inicio');
        }
    });
    Route::filter('contacts', function(){
        if (Auth::guest()) return Redirect::guest('Inicio');
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        if($total[2]<1){

            return Redirect::to('Inicio');
        }
    });
    Route::filter('administrator', function(){
        if (Auth::guest()) return Redirect::guest('Inicio');
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        if($total[3]<1){

            return Redirect::to('Inicio');
        }
    });
    Route::filter('createUser', function(){
        if (Auth::guest()) return Redirect::guest('Inicio');
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        if($total[4]<1){

            return Redirect::to('Inicio');
        }
    });
    Route::filter('deleteUser', function(){
        if (Auth::guest()) return Redirect::guest('/');
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        if($total[5]<1){

            return Redirect::to('Inicio');
        }
    });
    Route::filter('updateUser', function(){
        if (Auth::guest()) return Redirect::guest('/');
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        if($total[6]<1){

            return Redirect::to('Inicio');
        }
    });

    Route::filter('showUser', function(){
        if (Auth::guest()) return Redirect::guest('/');
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        if($total[7]<1){
            return Redirect::to('Inicio');
        }
    });
    Route::filter('roles', function(){
        if (Auth::guest()) return Redirect::guest('/');
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        if($total[8]<1){

            return Redirect::to('Inicio');
        }
    });
    Route::filter('contactAs', function(){
        if (Auth::guest()) return Redirect::guest('/');
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        if($total[9]<1){

            return Redirect::to('/');
        }
    });
    Route::filter('product', function(){
        if (Auth::guest()) return Redirect::guest('/');
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        if($total[10]<1){

            return Redirect::to('/');
        }
    });
    Route::filter('promotion', function(){
        if (Auth::guest()) return Redirect::guest('/');
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        if($total[11]<1){

            return Redirect::to('/');
        }
    });
    Route::filter('permiso12', function(){
        if (Auth::guest()) return Redirect::guest('/');
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        if($total[12]<1){

            return Redirect::to('/');
        }
    });




}








