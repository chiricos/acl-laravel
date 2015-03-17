<?php
namespace cerverus\Managers;

class CreateContactManager extends BaseManager
{

    public function getRules()
    {
        $rules=[
            'name'                  => 'required|unique:contacts',
            'last_name'             => 'required',
            'email'                 => 'required|email|unique:contacts',
            'phone'                 => 'required|numeric',
            'mobile_phone'          => 'required|numeric',
            'charge'                => 'required',
            'business_id'           => 'required|numeric'
        ];
        return  $rules;
    }

    public function getMessage()
    {
        $messages = [

        ];
        return $messages;
    }

    public function saveContact()
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