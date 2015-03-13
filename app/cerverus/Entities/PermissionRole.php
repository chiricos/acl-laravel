<?php namespace cerverus\Entities;


class PermissionRole extends \Eloquent
{
    protected $table="permissionRoles";
    protected $fillable = array('id','role_id','permission_id');



}
