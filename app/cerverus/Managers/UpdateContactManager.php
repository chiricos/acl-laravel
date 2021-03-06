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
            'phone'                 => 'required|numeric|digits_between:6,11',
            'mobile_phone'          => 'required|numeric|digits_between:6,11',
            'charge'               => 'required',
            'business_id'           => 'required|numeric'
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