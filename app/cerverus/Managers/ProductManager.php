<?php
namespace cerverus\Managers;


class ProductManager extends BaseManager
{

    public function getRules()
    {
        $rules=[
            'id'                  => 'required|numeric|unique:products',
            'dependency'          => 'required|numeric',
            'name'                => 'required|unique:products'
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

    public function saveProduct()
    {
        $this->entity->fill($this->data);
        $this->entity->save();

    }


}