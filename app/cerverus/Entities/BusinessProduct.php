<?php namespace cerverus\Entities;


class BusinessProduct extends \Eloquent
{
    protected $table='businessProducts';
    protected $fillable = array('id','business_id','product_id','value');

    public function payments()
    {
        return $this->hasMany('cerverus\Entities\Payment','businessProduct_id');
    }
}
