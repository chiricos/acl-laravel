<?php
namespace cerverus\Managers;

use cerverus\Entities\StateProduct;

class StateProductManager extends BaseManager
{

    public function getRules()
    {
        $rules=[
            'product_id'                    => 'required|numeric',
            'value'                         => 'required|numeric',
            'quantity'                      => 'required|numeric'
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

    public function saveProduct($id)
    {
        $this->entity->fill($this->data);
        $this->entity->business_id=$id;
        $this->entity->save();

    }

    public function updateProduct($id)
    {
        $stateProduct=StateProduct::find($id);
        $stateProduct->update($this->data);
    }

}