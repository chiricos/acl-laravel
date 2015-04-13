<?php
namespace cerverus\Managers;
use cerverus\Entities\User;

class UpdateProfileManager extends BaseManager
{

    public function getRules()
    {
        $rules=[

            'user_name'             => 'required|unique:users,user_name,'.$this->data["id"].'',
            'name'                  => 'required',
            'last_name'             => 'required',
            'email'                 => 'required|unique:users,email,'.$this->data["id"].'',
            'phone'                 => 'required|numeric|digits_between:6,11',
            'address'               => 'required'
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
            'date'                  => 'El campo va en formato de Fecha dd-mm-aa'
        ];
        return $messages;
    }

    public function updateUser()
    {
        $user=User::find($this->data["id"]);
        if($user->update($this->data))
        {
            return true;
        }else{
            return false;
        }

    }


}