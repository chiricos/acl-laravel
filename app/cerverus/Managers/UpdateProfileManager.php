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
            'phone'                 => 'required|numeric',
            'address'               => 'required'
        ];
        return  $rules;
    }

    public function getMessage()
    {
        $messages = [

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