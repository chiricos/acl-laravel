<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Menu extends Eloquent{

    protected $table = 'menus';
    protected $fillable = array("link","nivel","dependencianivel","dependencianodo");


}