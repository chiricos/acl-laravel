<?php
namespace cerverus\Managers;
use cerverus\Entities\User;

class CreateUserManager extends BaseManager
{

    public function getRules()
    {
        $rules=[

            'user_name'             => 'required|unique:users',
            'name'                  => 'required',
            'last_name'             => 'required',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required',
            'confirmation_password' => 'required|same:password',
            'phone'                 => 'required|numeric|digits_between:6,11',
            'address'               => 'required',
            'role_id'               => 'required|numeric',
            'manager'               => 'numeric'
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

    public function saveUser()
    {
        $data=$this->prepareData($this->data);
        $this->entity->photo="perfil.png";
        $this->entity->fill($data);
        if($this->entity->save())
        {
            return true;
        }
            return false;
    }


}