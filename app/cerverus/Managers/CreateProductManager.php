<?php
namespace cerverus\Managers;


class CreateProductManager extends BaseManager
{

    public function getRules()
    {
        $rules=[
            'product_id'                    => 'required|numeric',
            'value'                         => 'required|numeric'
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