<?php


namespace app\index\controller;


use think\facade\Log;

class Recode
{
    public function index()
    {
//        Log::record('测试日志！', 'info');
        trace('错误日志', 'error');

        var_dump(Log::getLog());
        Log::clear();//清理内存里的日志信息
    }
}