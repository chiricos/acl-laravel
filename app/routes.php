<?php

//SON LAS RUTAS EN LAS QUE SE LES ENVIA UN CORREO CON EL LINK PARA RESTAURAR LA CONTRASEÑA
route::get('restaurar', ['as' => 'restore', 'uses' => 'AuthController@showRestore']);
route::post('restaurar', ['as' => 'restore', 'uses' => 'AuthController@sendRestore']);


//RESTAURAR LA CONTRASEÑA
route::get('restaurarContraseña/{id}', ['as' => 'restorePassword', 'uses' => 'AuthController@restorePassword']);
route::post('restaurarContraseña/{id}', ['as' => 'restorePassword', 'uses' => 'AuthController@changePassword']);

//INICIO DE SESSION
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

