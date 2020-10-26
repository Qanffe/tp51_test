<?php


namespace app\behavior;


/**
 * Class Test
 * @package app\behavior
 * 自定义钩子行为
 */
class Test
{

    public function run($params)
    {
        echo $params . ' ,触发钩子行为<br>';
    }

    public function appInit()
    {
        echo '应用初始化行为';
    }
    public function appEnd()
    {
        echo '应用结束行为';
    }
    public function test()
    {
        echo 'jjjj';
    }
}