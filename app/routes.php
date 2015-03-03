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

    route::get('Inicio', ['as' => 'home', 'uses' => 'AuthController@index']);

    route::get('peril', ['as' => 'profile', 'uses' => 'AuthController@index']);

    Route::group(array('before'=>'business'),function() {
        route::get('admin/Empresas', ['as' => 'business', 'uses' => 'BusinessController@showBusiness']);
        route::post('admin/Empresas', ['as' => 'business', 'uses' => 'BusinessController@saveBusiness']);
    });

    Route::group(array('before'=>'contacts'),function(){
        route::get('admin/contactos', ['as' => 'contacts', 'uses' => 'ContactController@contact']);
        route::post('admin/contactos', ['as' => 'contacts', 'uses' => 'ContactController@createContact']);
        route::post('admin/cargos', ['as' => 'charges', 'uses' => 'ContactController@createCharges']);
        route::get('admin/eliminar/{id}', ['as' => 'deleteCharges', 'uses' => 'ContactController@deleteCharges']);
        route::get('admin/actualizar/{id}', ['as' => 'updateContacts', 'uses' => 'ContactController@showUpdateContact']);
        route::post('admin/actualizar/{id}', ['as' => 'updateContacts', 'uses' => 'ContactController@updateContact']);
    });

    Route::group(array('before'=>'administrator'),function(){

        route::get('admin/cuentas', ['as' => 'administrator', 'uses' => 'UserController@showUsers']);
    });

    Route::group(array('before'=>'createUser'),function(){
        route::get('admin/crearUsuario', ['as' => 'createUser', 'uses' => 'UserController@createUser']);
        route::post('admin/crearUsuario', ['as' => 'createUser', 'uses' => 'UserController@saveUser']);
    });

    Route::group(array('before'=>'updateUser'),function(){
        route::get('admin/actualizarUsuario/{id}', ['as' => 'updateUser', 'uses' => 'UserController@showUpdateUser']);
        route::post('admin/actualizarUsuario/{id}', ['as' => 'updateUser', 'uses' => 'UserController@updateUser']);
    });

    Route::group(array('before'=>'deleteUser'),function(){
        route::get('admin/eliminarUsuario/{id}', ['as' => 'deleteUser', 'uses' => 'UserController@deleteUser']);
    });


	// Esta ruta nos servirá para cerrar sesión.
	Route::get('logout', 'AuthController@logOut');
});

