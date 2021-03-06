<?php


//SON LAS RUTAS EN LAS QUE SE LES ENVIA UN CORREO CON EL LINK PARA RESTAURAR LA CONTRASEÑA
route::get('restaurar', ['as' => 'restore', 'uses' => 'AuthController@showRestore']);
route::post('restaurar', ['as' => 'restore', 'uses' => 'AuthController@sendRestore']);


//RESTAURAR LA CONTRASEÑA
route::get('restaurarContraseña/{id}', ['as' => 'restorePassword', 'uses' => 'AuthController@restorePassword']);
route::post('restaurarContraseña/{id}', ['as' => 'restorePassword', 'uses' => 'AuthController@changePassword']);

//INICIO DE SESSION

Route::group(array('before'=>'guest'),function()
{
    route::get('login', ['as' => 'login', 'uses' => 'AuthController@signUp']);
    route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
}
);


/**
 * Aqui va las rutas que puede acceder cuando esta logeado
 */

Route::group(array('before' => 'auth'), function()
{
    Route::get('/', function()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        return View::make('front.home',compact('total'));
    });

    route::get('Inicio', ['as' => 'home', 'uses' => 'HomeController@index']);
    route::get('InicioTodo', ['as' => 'homeAll', 'uses' => 'HomeController@all']);

    route::get('perfil', ['as' => 'profile', 'uses' => 'UserController@showProfile']);

    route::post('saveImage/{id}', ['as' => 'image', 'uses' => 'UserController@changeImage']);

    route::post('actualizardatos', ['as' => 'updateProfile', 'uses' => 'UserController@updateProfile']);
    route::post('cambiarContraseña', ['as' => 'changePassword', 'uses' => 'UserController@changePassword']);

    Route::group(array('before'=>'business'),function() {
        route::get('admin/Empresas', ['as' => 'business', 'uses' => 'BusinessController@showBusiness']);
        route::post('admin/Empresas', ['as' => 'Business', 'uses' => 'BusinessController@searchBusiness']);
        route::post('admin/crearEmpresas', ['as' => 'createBusiness', 'uses' => 'BusinessController@saveBusiness']);
        route::get('admin/crearEmpresas', ['as' => 'createBusiness', 'uses' => 'BusinessController@createBusiness']);
        route::get('admin/actualizarEmpresa/{id}', ['as' => 'updateBusiness', 'uses' => 'BusinessController@showUpdateBusiness']);
        route::post('admin/actualizarEmpresa/{id}', ['as' => 'updateBusiness', 'uses' => 'BusinessController@updateBusiness']);
        route::get('admin/verEmpresa/{id}', ['as' => 'seeBusiness', 'uses' => 'BusinessController@showSeeBusiness']);
        route::post('admin/verEmpresa/{id}', ['as' => 'seeBusiness', 'uses' => 'BusinessController@saveStates']);
        route::get('admin/pagos/{id}',['as'=>'paymentBusiness','uses'=>'BusinessController@showPayment']);
        route::post('admin/pagos/{id}',['as'=>'paymentBusiness','uses'=>'BusinessController@updatePayment']);
        route::post('admin/crearPagos/{id}',['as'=>'createPaymentBusiness','uses'=>'BusinessController@cratePayment']);
        route::get('admin/eliminarProductosCliente/{id}',['as'=>'deleteProducts','uses'=>'ProductController@delete']);
        route::get('admin/agregarProductos/{id}',['as'=>'createProducts','uses'=>'ProductController@showProducts']);
        route::post('admin/agregarProductos/{id}',['as'=>'createProducts','uses'=>'ProductController@addProducts']);
        route::get('admin/agregarProducto/{id}',['as'=>'addProducts','uses'=>'ProductController@seeProducts']);
        route::post('admin/agregarProducto/{id}',['as'=>'addProducts','uses'=>'ProductController@saveProducts']);
        route::get('admin/actualizarProducto/{id}',['as'=>'updateProducts','uses'=>'ProductController@showUpdateProducts']); route::get('admin/agregarProducto/{id}',['as'=>'addProducts','uses'=>'ProductController@seeProducts']);
        route::post('admin/actualizarProducto/{id}',['as'=>'updateProducts','uses'=>'ProductController@updateProducts']);
        route::get('admin/eliminarProducto/{id}',['as'=>'dellProducts','uses'=>'ProductController@dellProducts']);
    });

    Route::group(array('before'=>'contacts'),function(){
        route::get('admin/contactos', ['as' => 'contacts', 'uses' => 'ContactController@contact']);
        route::post('admin/contactos', ['as' => 'contacts', 'uses' => 'ContactController@createContact']);
        route::post('admin/buscarContactos', ['as' => 'searchContacts', 'uses' => 'ContactController@searchContacts']);
        route::post('admin/cargos', ['as' => 'charges', 'uses' => 'ContactController@createCharges']);
        route::get('admin/eliminar/{id}', ['as' => 'deleteCharges', 'uses' => 'ContactController@deleteCharges']);
        route::get('admin/actualizar/{id}', ['as' => 'updateContacts', 'uses' => 'ContactController@showUpdateContact']);
        route::post('admin/actualizar/{id}', ['as' => 'updateContacts', 'uses' => 'ContactController@updateContact']);
    });

    Route::group(array('before'=>'administrator'),function(){

        route::get('admin/cuentas', ['as' => 'administrator', 'uses' => 'UserController@showUsers']);
        route::post('admin/cuentas', ['as' => 'administrator', 'uses' => 'UserController@userSearch']);
    });

    Route::group(array('before'=>'roles'),function(){

        route::get('admin/roles', ['as' => 'roles', 'uses' => 'PermissionController@show']);
        route::get('admin/role/{id}', ['as' => 'showPermissions', 'uses' => 'PermissionController@showPermissions']);
        route::post('admin/actualizarPermisos/{id}', ['as' => 'updatePermissions', 'uses' => 'PermissionController@updatePermissions']);
    });

    Route::group(array('before'=>'createUser'),function(){
        route::get('admin/crearUsuario', ['as' => 'createUser', 'uses' => 'UserController@createUser']);
        route::post('admin/crearUsuario', ['as' => 'createUser', 'uses' => 'UserController@saveUser']);
    });

    Route::group(array('before'=>'showUser'),function(){
        route::get('admin/ver/{id}', ['as' => 'showUser', 'uses' => 'UserController@showUser']);
        route::post('admin/ver/{id}', ['as' => 'showUser', 'uses' => 'UserController@showUser']);
    });

    Route::group(array('before'=>'updateUser'),function(){
        route::get('admin/actualizarUsuario/{id}', ['as' => 'updateUser', 'uses' => 'UserController@showUpdateUser']);
        route::post('admin/actualizarUsuario/{id}', ['as' => 'updateUser', 'uses' => 'UserController@updateUser']);
    });

    Route::group(array('before'=>'deleteUser'),function(){
        route::get('admin/eliminarUsuario/{id}', ['as' => 'deleteUser', 'uses' => 'UserController@deleteUser']);
    });

    Route::group(array('before'=>'contactAs'),function(){
        route::get('admin/contactenos', ['as' => 'contactAs', 'uses' => 'UserController@showSend']);
        route::post('admin/contactenos', ['as' => 'contactAs', 'uses' => 'UserController@sendContact']);
    });

    Route::group(array('before'=>'product'),function(){
        route::get('admin/product', ['as' => 'product', 'uses' => 'ProductController@product']);
        route::post('admin/product', ['as' => 'productSearch', 'uses' => 'ProductController@productSearch']);
        route::get('admin/crearProducto', ['as' => 'createProduct', 'uses' => 'ProductController@createProduct']);
        route::post('admin/crearProducto', ['as' => 'createProduct', 'uses' => 'ProductController@saveProduct']);
        route::get('admin/actualizarProductos/{id}',['as'=>'updateProduct','uses'=>'ProductController@update']);
        route::post('admin/actualizarProductos/{id}',['as'=>'updateProduct','uses'=>'ProductController@updateSave']);
        route::get('admin/eliminarProductos/{id}',['as'=>'deleteProduct','uses'=>'ProductController@deleteProduct']);
        route::post('admin/eliminarProductos/{id}',['as'=>'deleteProduct','uses'=>'ProductController@deleteProduct']);
    });

    Route::group(array('before'=>'promotion'),function(){
        route::get('admin/promocion', ['as' => 'promotion', 'uses' => 'PromotionController@show']);
        route::post('admin/promocion', ['as' => 'promotion', 'uses' => 'PromotionController@sendPromotion']);
    });

    Route::group(array('before'=>'charts'),function(){
        route::get('admin/reportes', ['as' => 'charts', 'uses' => 'ReportController@show']);
        route::get('admin/reportesProductos', ['as' => 'chart', 'uses' => 'ReportController@index']);
    });



    Route::get('mail','HomeController@email');

    Route::get('map',function()
    {
        return View::make('layou.map');
    });

    Route::get('contact',function()
    {
       return View::make('emails.plantilleHome');
    });


	// Esta ruta nos servirá para cerrar sesión.
	Route::get('logout', 'AuthController@logOut');
});

