<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Permiso extends Eloquent{

    protected $table = 'permisos_usuarios';
    protected $fillable = array("id_usuario","id_permiso");


}