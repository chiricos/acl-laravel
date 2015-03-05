<?php

namespace cerverus\Repositories;

use cerverus\Entities\User;

class UserRepo extends BaseRepo
{

    protected function getModel()
    {
        return new User();
    }

    public function passwordRestart($email)
    {
        $user = $this->model;
        $user = $user::where('email', '=', $email)->first();
        if (!$user)
            return $data = ['link' => "restorePassword/"]
                + ['return' => false]
                + ['username' => ''];

        $restore_password = str_random(30);
        $user->restore_password = $restore_password;
        $user->save();
        return $data = ['link' => 'restaurarContraseña/' . $restore_password]
            + ['return' => true]
            + ['username' => $user->user_name]
            + ['id'=>$user->id];
    }

    public function validatorUser($restore_password)
    {
        $user = $this->model;
        $user = $user::where('restore_password', '=', $restore_password)->first();
        return $user;
    }

    public function getManager($id,$role_id,$user_name)
    {
        $users=['seleccione un encargado'=>'seleccione un encargado'];
        if($role_id==1)
        {
            $users=['seleccione un encargado'=>'seleccione un encargado']+User::whereRaw('role_id=3')->lists('user_name','id');
        }
        if($role_id==2)
        {
            $users=['seleccione un encargado'=>'seleccione un encargado']+User::whereRaw('manager='.$id)->lists('user_name','id');
        }
        if($role_id==3)
        {
            $users=[$id => $user_name];
        }
        return $users;
    }
    public function getState()
    {
        return ['seleccione un estado'=>'seleccione un estado']
        +['1'=>'Activo']
        +['2'=>'Mensual']
        +['3'=>'Moroso']
        +['4'=>'Eliminado'];
    }

    public function getStates()
    {
        return ['seleccione un estado'=>'seleccione un estado']
        +['1'=>'Cotizacion ordinaria y anexo']
        +['2'=>'Portafolio y propuesta']
        +['3'=>'Primera llamada']
        +['4'=>'Cotizacion especifica']
        +['5'=>'Segunda llamada']
        +['6'=>'Negociacion'];
    }
}