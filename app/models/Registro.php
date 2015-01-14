
<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Registro extends Eloquent{

    protected $table = 'registros';
    protected $fillable = array("nombre","accion");


}