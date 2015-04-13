<?php
namespace cerverus\Managers;

use cerverus\Entities\Payment;
use cerverus\Repositories\LogRepo;

class PaymentManager extends BaseManager
{

    public function getRules()
    {
        $rules=[
            'type'              => 'required',
            '0'                 => 'required_if:type,1|required_if:type,2|required_if:type,3',
            '1'                 => 'required_if:type,2|required_if:type,3',
            '2'                 => 'required_if:type,3'
        ];
        return  $rules;
    }

    public function getMessage()
    {
        $messages = [
            'required_if' =>'el campo es requerido',
            'required'              => 'El campo es requerido',
            'unique'                => 'El campo ya se encuentra registrado',
            'numeric'               => 'El campo tiene que ir en numeros',
            'digits_between'        => 'El campo esta muy corto o muy largo',
            'email'                 => 'El campo debe ir con el formatio de correo',
            'image'                 => 'El archivo debe ser una imagen',
            'date'                  => 'El campo va en formato de Fecha dd-mm-aa'        ];
        return $messages;
    }

    public function savePayment($id)
    {

        Payment::where('businessProduct_id','=',$id)->delete();
        for($i=0;$i<$this->data["type"];$i++)
        {
            $newPayment=new Payment(['businessProduct_id'=>$id]+['type'=>$this->data["type"]]+['payment'=>$this->data[$i]]);
            $newPayment->save();

        }
        return true;

    }


}