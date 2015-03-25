<?php
namespace cerverus\Managers;

use cerverus\Entities\Product;

class ProductManager extends BaseManager
{

    public function getRules()
    {
        $rules=[
            'id'                  => 'required|numeric|unique:products',
            'dependency'          => 'required|numeric',
            'name'                => 'required'
        ];
        return  $rules;
    }

    public function getMessage()
    {
        $messages = [
            'required'          => 'El campo es requerido',
            'unique'            => 'El campo ya se encuentra registrado',
            'numeric'           => 'el campo va en numeros'
        ];
        return $messages;
    }

    public function saveProduct()
    {
        $this->entity->fill($this->data);
        $this->entity->save();

    }


}