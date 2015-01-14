<?php


// Nos mostrará el formulario de login.
Route::get('login', 'AuthController@showLogin');
// Validamos los datos de inicio de sesión.
Route::post('login', 'AuthController@postLogin');
// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{

	// Esta será nuestra ruta de bienvenida.
	Route::get('/', function()
	{
		return View::make('index');
	});

    Route::group(array('before'=>'permiso1'),function(){
        Route::get('permiso1','PermisosController@permiso1');
        Route::post('permiso1','PermisosController@permiso1');
    });
    Route::group(array('before'=>'permiso2'),function(){
        Route::get('permiso2','PermisosController@permiso2');
    });
    Route::group(array('before'=>'permiso5'),function(){
        Route::get('permiso3','PermisosController@permiso3');
    });
    Route::group(array('before'=>'permiso4'),function(){
        Route::get('permiso4','PermisosController@permiso4');
    });
    Route::group(array('before'=>'permiso5'),function(){
        Route::get('permiso5','PermisosController@permiso5');
    });
    Route::group(array('before'=>'permiso6'),function(){
        Route::get('permiso6','PermisosController@permiso6');
    });
    Route::group(array('before'=>'permiso7'),function(){
        Route::get('permiso7','PermisosController@permiso7');
    });
    Route::group(array('before'=>'permiso8'),function(){
        Route::get('permiso8','PermisosController@permiso8');
    });
    Route::group(array('before'=>'permiso9'),function(){
        Route::get('permiso9','PermisosController@permiso9');
    });
    Route::group(array('before'=>'permiso10'),function(){
        Route::get('permiso10','PermisosController@permiso10');
    });
    Route::group(array('before'=>'permiso11'),function(){
        Route::get('permiso11','PermisosController@permiso11');
    });
    Route::group(array('before'=>'permiso12'),function(){
        Route::get('permiso12','PermisosController@permiso12');
    });



	// Esta ruta nos servirá para cerrar sesión.
	Route::get('logout', 'AuthController@logOut');
});

Route::get('registrarse','PermisosController@registrarse');
Route::post('registrarse','PermisosController@registrarse');

Route::get('menu','PermisosController@menu');