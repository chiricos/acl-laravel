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
                'phone'                 => 'numeric',
                'ext'                   => 'numeric',
                'email'                 => 'required|email|unique:business',
                'second_email'          => 'email|unique:business',
                'mobile_phone'          => 'required|numeric',
                'manager'               => 'required|numeric',
                'fax'                   => 'numeric',
                'payment_date'          => 'required',
                'expedition_date'       => 'required',
                'photo'                 => 'image'
            ];
        }else{
            $rules=[

                'name'                  => 'required|unique:business',
                'state'                 => 'required|numeric',
                'nit'                   => 'numeric',
                'phone'                 => 'numeric',
                'ext'                   => 'numeric',
                'email'                 => 'required|email|unique:business',
                'second_email'          => 'email|unique:business',
                'mobile_phone'          => 'required|numeric',
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