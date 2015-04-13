<?php
namespace cerverus\Managers;

use cerverus\Entities\Product;

class UpdateProductManager extends BaseManager
{

    public function getRules()
    {
        $rules=[
            'id'                  => 'required|numeric|unique:products,id,'.$this->data["id"],'',
            'dependency'          => 'required|numeric',
            'name'                => 'required'
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

    public function updateProduct($id)
    {

        if($id!=$this->data['id'])
        {
            return false;
        }
        $product=Product::find($id);

        if( $product->update($this->data))
        {
            return true;
        }

    }


}