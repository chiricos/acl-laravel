<?php
namespace cerverus\Managers;
use cerverus\Entities\User;

class UserManager extends BaseManager
{

    public function getRules()
    {
        $rules=[

            'password'              => 'required',
            'confirmar_password'    => 'required|same:password'


        ];
        return  $rules;
    }

    public function getMessage()
    {
        $messages = [

            'required'              => 'El campo es requerido',
            'unique'                => 'El campo ya se encuentra registrado',
            'numeric'               => 'El campo tiene que ir en numeros',
            'digits_between'        => 'El campo esta muy corto o muy largo',
            'email'                 => 'El campo debe ir con el formatio de correo',
            'image'                 => 'El archivo debe ser una imagen',
            'date'                  => 'El campo va en formato de Fecha dd-mm-aa',
            'same'      => 'Las contraseñas deben ser iguales'
        ];
        return $messages;
    }

    public function savePassword($restore_password,$auth)
    {

        if($auth==1)
        {
            $user = User::where('id', '=', $restore_password)->first();
        }else{
            $user = User::where('restore_password', '=', $restore_password)->first();
        }
        $user->password=$this->data['password'];
        if($user->save())
        {
            return ['username'=>$user->user_name]+['id'=>$user->id];
        }
        return false;

    }


}