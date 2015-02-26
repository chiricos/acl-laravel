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
            'phone'                 => 'required|numeric',
            'address'               => 'required',
            'role_id'               => 'required|numeric',
            'manager'               => 'required|numeric'
        ];
        return  $rules;
    }

    public function getMessage()
    {
        $messages = [

        ];
        return $messages;
    }

    public function saveUser()
    {
        $data=$this->prepareData($this->data);
        $this->entity->fill($data);
        if($this->entity->save())
        {
            return true;
        }
            return false;
    }


}