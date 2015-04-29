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
                'phone'                 => 'numeric|digits_between:6,11',
                'ext'                   => 'numeric',
                'email'                 => 'required|email|unique:business,email,'.$this->data["id"].'',
                'second_email'          => 'email|unique:business,email,'.$this->data["id"].'',
                'mobile_phone'          => 'required|numeric|digits_between:6,11',
                'manager'               => 'required|numeric',
                'fax'                   => 'numeric',
                'payment_date'          => 'required|date',
                'expedition_date'       => 'required|date',
                'photo'                 => 'image'
            ];
        }else{
            $rules=[

                'name'                  => 'required|unique:business,name,'.$this->data["id"].'',
                'state'                 => 'required|numeric',
                'nit'                   => 'numeric',
                'phone'                 => 'numeric|digits_between:6,11',
                'ext'                   => 'numeric',
                'email'                 => 'required|email|unique:business,email,'.$this->data["id"].'',
                'second_email'          => 'email|unique:business,email,'.$this->data["id"].'',
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
        if($this->data["maps"]=="")
        {
            $this->data["maps"]=$this->entity->maps;
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