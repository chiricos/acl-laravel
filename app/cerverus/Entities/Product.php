<?php namespace cerverus\Entities;


class Product extends \Eloquent
{
    protected $fillable = array('id','dependency','name');

    public function businessProduct()
    {
        return $this->hasMany('cerverus\Entities\BusinessProduct','product_id');
    }
}
