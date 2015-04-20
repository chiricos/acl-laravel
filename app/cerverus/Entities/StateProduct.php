<?php namespace cerverus\Entities;


class StateProduct extends \Eloquent
{
    protected $table="stateProducts";
    protected $fillable = array('id','business_id','product_id','value','quantity');

}
