<?php
namespace app\index\controller;

use app\common\base\BaseController;
use think\App;
use think\Controller;
use app\index\model\Test;
use app\facade\Test as TestController;
use think\Exception;
use think\exception\ErrorException;
use think\exception\HttpException;
use think\facade\Hook;

class Inject extends BaseController
{
//    protected $middleware = ['Check', 'Auto'];
    protected $test;
    //依赖注入
    public function __construct(Test $test)
    {
        parent::__construct();
        $this->test = $test;
    }

    public function test1($id)
    {
        return $id;
    }

    public function index()
    {
//        throw new Exception('异常消息', 10086);
//        exception('错误！', '10010');

//        try {
//            echo 0/0;
//        } catch (\ErrorException $e) {
//            echo $e->getMessage();
//        }

//        throw new HttpException('404', '页面不存在');
//        abort('404', '页面没有');

    }

    //容器
    public function index1()
    {
        //绑定容器
//        bind('Test', 'app\index\model\User');
//        bind([
////            'Test'  =>  'app\index\model\User'
//            'Test'  =>  \app\index\model\User::class
//        ]);
//        return app('Test')->name;

        bind('hh', function ($name){
            return '哈哈哈'.$name;
        });
        return app('hh', '22');
    }

    //facade 测试
    public function test()
    {
//        $test = new TestController;
//        return $test->index('word');
        return TestController::index('php1');
    }

    //钩子 测试
    //行为文件 /tags.php
    public function gouzi()
    {
        echo '233';
//        return '<br>结束';
        //触发钩子
        Hook::add('app_init', function ($param){
            echo '哈哈哈哈';
        });
        Hook::listen('test', '哈哈');
    }


}

//class Inject extends Controller
//{
//    protected $middleware = ['Check', 'Auto'];
//    public function test1($id)
//    {
//        return $id;
//    }
//}