<?php namespace cerverus\Entities;


class Payment extends \Eloquent
{
    protected $fillable = array('id','businessProduct_id','type','payment','validator');
}
