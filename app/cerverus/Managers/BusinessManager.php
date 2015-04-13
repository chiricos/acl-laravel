<?php
namespace cerverus\Managers;

use cerverus\Entities\Payment;
use cerverus\Entities\Record;
use cerverus\Repositories\BusinessRepo;

class BusinessManager extends BaseManager
{

    public function getRules()
    {
        if($this->data["type"]==1)
        {
            $rules=[

                'name'                  => 'required|unique:business',
                'state'                 => 'required|numeric',
                'nit'                   => 'numeric',
                'phone'                 => 'numeric|digits_between:6,11',
                'ext'                   => 'numeric',
                'email'                 => 'required|email|unique:business',
                'second_email'          => 'email|unique:business',
                'mobile_phone'          => 'required|numeric|digits_between:6,11',
                'manager'               => 'required|numeric',
                'fax'                   => 'numeric',
                'payment_date'          => 'required|date',
                'expedition_date'       => 'required|date',
                'photo'                 => 'image'
            ];
        }else{
            $rules=[

                'name'                  => 'required|unique:business',
                'state'                 => 'required|numeric',
                'nit'                   => 'numeric',
                'phone'                 => 'numeric|digits_between:6,11',
                'ext'                   => 'numeric',
                'email'                 => 'required|email|unique:business',
                'second_email'          => 'email|unique:business',
                'mobile_phone'          => 'required|numeric|digits_between:6,11',
                'manager'               => 'required|numeric',
                'fax'                   => 'numeric',
                'photo'                 => 'image'
            ];
        }

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

    public function saveBusiness()
    {
        $data=$this->prepareData($this->data);
        $file=$data["photo"];
        if($data['photo']!="")
        {
            $before = str_random(15);
            $destinationPath="business";
            $data["photo"]=$before.$file->getClientOriginalName();
            $file->move($destinationPath, $before.$file->getClientOriginalName());
        }else{
            $data["photo"]="perfil.png";
        }
        $this->entity->fill($data);
        $this->entity->save();
        $record=new Record();
        if($this->entity->record()->save($record))
        {
            if($data["type"]==1)
            {
                return "Cliente";
            }
            return "Prospecto";
        }
        return false;
    }


}