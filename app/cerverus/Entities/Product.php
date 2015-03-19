<?php namespace cerverus\Entities;


class Product extends \Eloquent
{
    protected $fillable = array('id','dependency','name');
}
