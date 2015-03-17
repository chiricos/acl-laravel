<?php
namespace cerverus\Managers;

use cerverus\Entities\Contact;

class UpdateContactManager extends BaseManager
{

    public function getRules()
    {
        $rules=[
            'name'                  => 'required|unique:contacts,name,'.$this->data["id"],'',
            'last_name'             => 'required',
            'email'                 => 'required|email|unique:contacts,email,'.$this->data["id"],'',
            'phone'                 => 'required|numeric',
            'mobile_phone'          => 'required|numeric',
            'charge'               => 'required',
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

    public function updateContact($id)
    {
        $contact=Contact::find($id);
        if($contact->update($this->data))
        {
            return true;
        }else{
            return false;
        }

    }


}