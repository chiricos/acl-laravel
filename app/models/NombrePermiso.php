<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class NombrePermiso extends Eloquent{

    protected $table = 'permisos';
    protected $fillable = array("id","nombre");


}