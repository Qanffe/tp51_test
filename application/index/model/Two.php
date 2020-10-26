<?php


namespace app\index\model;


use think\Model;

class Two extends Model
{
    public function one()
    {
        return $this->belongsTo('One', 'uid');
    }
}