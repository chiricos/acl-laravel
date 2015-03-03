<?php namespace cerverus\Entities;


class Business extends \Eloquent
{
    protected $table="business";
    protected $fillable = array('id','name','type','state','nit','address','phone','ext','email','second_email','mobile_phone','manager','photo','page_web','fax','country','city','skype','maps','payment_date','expedition_date','source');
}
