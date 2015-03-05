<?php
namespace cerverus\Managers;

class UpdateBusinessManager extends BaseManager
{

    public function getRules()
    {
        if($this->data["type"]==1)
        {
            $rules=[
                'name'                  => 'required|unique:business,name,'.$this->data["id"].'',
                'state'                 => 'required|numeric',
                'nit'                   => 'numeric',
                'phone'                 => 'numeric',
                'ext'                   => 'numeric',
                'email'                 => 'required|email|unique:business,email,'.$this->data["id"].'',
                'second_email'          => 'email|unique:business,email,'.$this->data["id"].'',
                'mobile_phone'          => 'required|numeric',
                'manager'               => 'required|numeric',
                'fax'                   => 'numeric',
                'payment_date'          => 'required',
                'expedition_date'       => 'required',
                'photo'                 => 'image'
            ];
        }else{
            $rules=[

                'name'                  => 'required|unique:business,name,'.$this->data["id"].'',
                'state'                 => 'required|numeric',
                'nit'                   => 'numeric',
                'phone'                 => 'numeric',
                'ext'                   => 'numeric',
                'email'                 => 'required|email|unique:business,email,'.$this->data["id"].'',
                'second_email'          => 'email|unique:business,email,'.$this->data["id"].'',
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

    public function updateBusiness()
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