<?php


namespace app\index\controller;


use app\common\base\BaseController;
use think\Db;

class Page extends BaseController
{
    public function index()
    {
        $list = Db::name('test')->paginate('5')->each(function ($item, $key) {
            $item['time'] = date('Y-m-d H:i:s', $item['time']);
            return $item;
        });


        return json($list);

        $totle = $list->total();

        $this->assign([
            'list'  =>  $list,
            'totle'  =>  $totle,
        ]);
        return $this->fetch();
    }
}