<?php
namespace app\index\controller;


use app\common\base\BaseController;

class Moban extends BaseController
{
    public function index()
    {

        $this->assign('title','模板标题');
        return $this->fetch();
    }

    public function block()
    {
        $this->assign('title','模板');
        return $this->fetch();
    }
}