<?php


namespace app\index\controller;


use app\index\model\One;
use app\index\model\Two;

class Moxing
{
    public function index()
    {
        $info = One::get(1);
        echo $info->two;

        $info2 = Two::get(2);
        echo $info2->one;

    }


    public function insert()
    {
        $data = [
            'name'  =>  '老徐',
            'time'  =>  time(),
            'mobile'=>  '13333333333'
        ];

        $user = One::create($data);

        $data1 = [
            'uid'   =>  $user->id,
            'hobby' =>  '喜欢妹子'
        ];

        $info = Two::create($data1);
        echo $info->id;
    }
}