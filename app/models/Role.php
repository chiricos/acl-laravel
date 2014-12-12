<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Role extends Eloquent{

    protected $table = 'permisos_roles';
    protected $fillable = array("id_role","id_permiso");


}