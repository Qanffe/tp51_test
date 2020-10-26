<?php
namespace app\index\controller;

use app\common\base\BaseController;
use app\index\model\Test;

class See extends BaseController
{
    public function index()
    {
        $name = '';
        $this->assign([
           'name'   =>  $name,
           'pwd'   =>  '123',
           'time'   =>  time(),
           'num'   =>  11,
        ]);

        $data = Test::all();

        $this->assign([
            'list'  =>  $data
        ]);

        //创建一个对象
        $obj = new \stdClass();
        $obj->username = '老王';
        $this->assign('user',$obj);

        return $this->fetch();
    }

    public function form_token()
    {
        return $this->fetch();
    }
}