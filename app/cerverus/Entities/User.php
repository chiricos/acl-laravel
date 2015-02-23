<?php

namespace cerverus\Entities;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table='users';
    protected $fillable = ['name','last_name','email','password','restore_password','address','phone','photo','in_charge','role_id','user_name'];

    protected $perPage = 2;
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function setPasswordAttribute($value)
    {
        if (!empty ($value)) {
            $this->attributes['password'] = \Hash::make($value);

        }
    }
}
