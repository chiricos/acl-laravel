<?php namespace cerverus\Entities;


class Permission extends \Eloquent
{
    protected $fillable = array('id','name');

    public function permissionRole()
    {
        return $this->hasOne('cerverus\Entities\PermissionRole');
    }
}
