<?php
namespace cerverus\Managers;

class ChangeImageManager extends BaseManager
{

    public function getRules()
    {
            $rules=[

                'photo'                 => 'require|image'
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

    public function changeImage()
    {
        $file=$this->data["photo"];
        if($this->data["photo"]=="")
        {
            $this->data["photo"]=$this->entity->photo;
        }else{
            $before = str_random(15);
            $destinationPath="business";
            $this->data["photo"]=$before.$file->getClientOriginalName();
            $file->move($destinationPath, $before.$file->getClientOriginalName());
        }
        $this->entity->fill($this->data);
        if($this->entity->update($this->data))
        {
            if($this->data["type"]==1)
            {
                return "Cliente";
            }
            return "Prospecto";
        }
        return false;
    }




}