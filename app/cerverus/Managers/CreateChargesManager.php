<?php
namespace cerverus\Managers;

class CreateChargesManager extends BaseManager
{

    public function getRules()
    {
        $rules=[
            'name'                  => 'required|unique:charges'
        ];
        return  $rules;
    }

    public function getMessage()
    {
        $messages = [

        ];
        return $messages;
    }

    public function saveCharges()
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