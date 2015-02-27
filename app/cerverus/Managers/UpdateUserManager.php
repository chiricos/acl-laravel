<?php
namespace cerverus\Managers;
use cerverus\Entities\User;

class UpdateUserManager extends BaseManager
{

    public function getRules()
    {
        $rules=[

            'user_name'             => 'required|unique:users,user_name,'.$this->data["id"].'',
            'name'                  => 'required',
            'last_name'             => 'required',
            'email'                 => 'required|unique:users,email,'.$this->data["id"].'',
            'phone'                 => 'required|numeric',
            'address'               => 'required',
            'role_id'               => 'required|numeric',
            'manager'               => 'required|numeric',
            'manager'               => 'required|unique:users,id,NULL,id,id,'.$this->data["id"].''
        ];
        return  $rules;
    }

    public function getMessage()
    {
        $messages = [

        ];
        return $messages;
    }

    public function updateUser($id)
    {
        $user=User::find($id);
        if($user->update($this->data))
        {
            return true;
        }else{
            return false;
        }

    }


}