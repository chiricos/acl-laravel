<?php

route::get('restaurar', ['as' => 'restore', 'uses' => 'AuthController@drawde']);
/**
 * Aqui va la ruta del inicio de session
 */

route::get('login', ['as' => 'login', 'uses' => 'AuthController@signUp']);
route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);

/**
 * Aqui va las rutas que puede acceder cuando esta logeado
 */

Route::group(array('before' => 'auth'), function()
{
    Route::get('/', function()
    {
        return View::make('index');
    });

    Route::group(array('before'=>'Permission1'),function(){
        route::get('Inicio', ['as' => 'home', 'uses' => 'AuthController@index']);
    });


	// Esta ruta nos servirá para cerrar sesión.
	Route::get('logout', 'AuthController@logOut');
});

