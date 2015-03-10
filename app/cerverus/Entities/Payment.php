<?php namespace cerverus\Entities;


class Payment extends \Eloquent
{
    protected $fillable = array('id','name','business_id','first_payment','second_payment','third_payment','first_validator','second_validator','third_validator');
}
