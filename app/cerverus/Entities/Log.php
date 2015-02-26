<?php namespace cerverus\Entities;


class Log extends \Eloquent
{
    protected $fillable = array('id','responsible','responsible_id','action','affected_entity','affected_entity_id');
}
