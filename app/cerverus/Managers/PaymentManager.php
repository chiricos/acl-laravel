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
            'required_if' =>'el campo es requerido'
        ];
        return $messages;
    }

    public function savePayment($id)
    {

        $payments=Payment::where('business_id','=',$id)->delete();
        for($i=0;$i<$this->data["type"];$i++)
        {
            $newPayment=new Payment(['business_id'=>$id]+['type'=>$this->data["type"]]+['payment'=>$this->data[$i]]);
            $newPayment->save();

        }
        return true;

    }


}