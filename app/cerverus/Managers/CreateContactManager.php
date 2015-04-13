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
            'phone'                 => 'required|numeric|digits_between:6,11',
            'mobile_phone'          => 'required|numeric|digits_between:6,11',
            'charge'                => 'required',
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