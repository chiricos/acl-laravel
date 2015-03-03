<?php
namespace cerverus\Managers;

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
                'payment_date'          => 'required|exists:payment_date',
                'expedition_date'       => 'required|exists:expedition_date'
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
                'fax'                   => 'numeric'
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
        if($this->entity->save())
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