<?php namespace cerverus\Entities;


class Contact extends \Eloquent
{
    protected $fillable = array('id','name','last_name','charge','email','phone','mobile_phone','business_id');
}
