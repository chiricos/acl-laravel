<?php

use cerverus\Entities\Permission;
use cerverus\Entities\PermissionUser;
use cerverus\Entities\PermissionRole;

class Proceso
{
    private $_tableRole;
    private $_tableUser;
    private $_tablePermission;
    private $_AllPermission;
    private $_permissionRejected;

    public function __construct()
    {
        $this->_tablePermission= $total_permisos=Permission::all()->lists('name','id');
        $this->_tableRole=PermissionRole::whereRaw("role_id=".Auth::user()->role_id."")->lists('permission_id');
        $this->_tableUser=PermissionUser::whereRaw("user_id=".Auth::user()->id."")->lists('permission_id');
        $this->_permissionRejected=PermissionUser::whereRaw("user_id=".Auth::user()->id."")->lists('permission_no');
    }

    public function filtrarPermisos()
    {
        $this->_AllPermission=array_merge($this->_tableRole,$this->_tableUser);

        for ($i=1;$i<=count($this->_tablePermission);$i++)
        {
            for ($j=0;$j<count($this->_AllPermission);$j++)
            {
                if($i==$this->_AllPermission[$j])
                {
                    $this->_tablePermission[$i]=1;
                }
            }
            if($this->_tablePermission[$i]!=1){
                $this->_tablePermission[$i]=0;
            }
        }
        return $this->procesoFinal();

    }

    public function procesoFinal()
    {
        for ($i=1;$i<=count($this->_tablePermission);$i++)
        {
            for ($j=0;$j<count($this->_permissionRejected);$j++)
            {
                if($i==$this->_permissionRejected[$j])
                {
                    $this->_tablePermission[$i]=0;
                }
            }

        }
        return $this->_tablePermission;
    }

}