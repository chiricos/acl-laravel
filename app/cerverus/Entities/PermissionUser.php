<?php namespace cerverus\Entities;


class PermissionUser extends \Eloquent
{
    protected $table='permissionUsers';
    protected $fillable = array('id','user_id','permission_id','permission_no');
}
