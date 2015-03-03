<?php namespace cerverus\Entities;


class Contact extends \Eloquent
{
    protected $fillable = array('id','name','last_name','charges_id','email','phone','mobile_phone','business_id');
}
