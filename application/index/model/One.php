<?php


namespace app\index\model;


use think\Model;

class One extends Model
{
    public function Two()
    {
        return $this->hasOne('Two', 'uid');
    }
}