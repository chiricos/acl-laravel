<?php

use cerverus\Entities\Role;
use cerverus\Entities\Permission;
use cerverus\Entities\PermissionRole;
use cerverus\Repositories\LogRepo;

class PermissionController extends BaseController
{
    public function show()
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $roles=Role::all();
        return View::make('back.roles',compact('total','roles'));
    }

    public function showPermissions($id)
    {
        $permiso =new Proceso();
        $total=$permiso->filtrarPermisos();
        $permissions=Permission::with(['permissionRole'=>function($query) use($id)
        {
            $query->where('role_id','=',$id);
        }])->get();

        return View::make('back.showRole',compact('total','permissions','id'));
    }

    public function updatePermissions($id)
    {
        if($id>1)
        {
            PermissionRole::where('role_id', '=', $id)->delete();
            $permission=Permission::all();
            for($i=0;$i<=count($permission);$i++)
            {
                if(Input::get(''.$i.''))
                {
                    $permissionRole = new PermissionRole(['role_id' => $id, 'permission_id' => Input::get('' . $i . '')]);
                    $permissionRole->save();
                }
            }
            new LogRepo(
                [
                    'responsible'=> Auth::user()->user_name,
                    'responsible_id'=> Auth::user()->id,
                    'action' => 'ha actualizado permisos de role '
                ]
            );
            return Redirect::to('/admin/role/'.$id)->with('message','Se actualizaron los permisos correctamente');
        }
        return Redirect::to('/admin/role/'.$id)->with('message_error','Al Super Administrador no se le puede modificar los permisos');
    }
}
