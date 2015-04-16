<?php
namespace cerverus\Managers;

use cerverus\Entities\User;

class ChangeImageManager extends BaseManager
{

    public function getRules()
    {
            $rules=[

                'photo'                 => 'image'
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

    public function changeImage($id)
    {
        $user=User::find($id);
        $file=$this->data["photo"];
        if($this->data["photo"]=="")
        {
            $this->data['photo']=$user->photo;
        }else{
            $before = str_random(15);
            $destinationPath="user";
            $this->data["photo"]=$before.$file->getClientOriginalName();
            $file->move($destinationPath, $before.$file->getClientOriginalName());
        }
        $user->fill($this->data);
        if($user->update($this->data))
        {
            return true;
        }
        return false;
    }




}