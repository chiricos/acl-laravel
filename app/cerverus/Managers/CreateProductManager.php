<?php
namespace cerverus\Managers;

use cerverus\Entities\Payment;

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

    public function saveProduct($id)
    {
        $this->entity->fill($this->data);
        $this->entity->business_id=$id;
        $this->entity->save();
        $payment=new Payment();
        $this->entity->payments()->save($payment);


    }


}