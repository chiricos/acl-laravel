<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/
class UserTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'nombre'  => 'michael',
            'correo'     => 'camacho@gmail.com',
            'apellido'=> 'camacho',
            'password' => Hash::make('123456'),
            'id_role' => '3'
             // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
    }
}