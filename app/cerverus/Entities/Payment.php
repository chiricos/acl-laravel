<?php namespace cerverus\Entities;


class Payment extends \Eloquent
{
    protected $fillable = array('id','business_id','type','payment','validator');
}
