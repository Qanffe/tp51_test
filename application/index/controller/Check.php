<?php


namespace app\index\controller;


use app\common\validate\User;

use app\common\base\BaseController;
use think\facade\Request;
use think\Validate;
use think\validate\ValidateRule;

class Check extends BaseController
{
    // 是否批量验证
    protected $batchValidate = true;

    // 验证失败是否抛出异常
//    protected $failException = true;

    public function index()
    {
        $data = [
            'name'  =>  '老王',
            'price' =>  190,
            'email' =>  '123@168com',
            'status'=>  1
        ];

        //使用验证器的接口验证
//        $validata = new User();
//        if(!$validata->batch()->scene('edit')->check($data)){
//            dump($validata->getError());
//        }

        $result = $this->validate($data, 'app\index\validate\User.add');
        dump($result);

        //当目前控制器验证
//        $validate = new Validate();
////        $validate->batch()->rule([
////            'name|名字'      =>  'require|max:10',
////            'price|价格'  =>  ['number', 'between'=>'1,100'],
////        ]);
//        //对象化定义
//        $validate->batch()->rule([
//            'name|名字'      =>  ValidateRule::isRequire()->max(10),
//            'price|价格'  =>  ValidateRule::isNumber()->between('1,100'),
//        ]);
//
//        //闭包自定义验证规则
////        $validate->batch()->rule([
////            'name|名字'      =>  function ($value, $data){
////                return $value=='老王' ? '名字不能为：老王' : true ;
////            },
//////            'price|价格'  =>  ['number', 'between'=>'1,100'],
////        ]);
//
//        //自定义提示信息
////        $validate->message([
////            'name.require'  =>  '名字不能空',
//////            'name.require'  =>  'name_require',//语言包定义lang/zh-cn.php；
////        ]);
//        if(!$validate->check($data)){
//            dump($validate->getError());
//        }
    }

    public function read($id)
    {
        return 'read:'. $id;
    }

    public function facaed()
    {
        $name = input('post.name');

        $data = [
            'name'  => $name,
            '__token__' => input('post.__token__'),
        ];

        $validate = new Validate();

        $validate->rule([
            'name'  => 'require|token',
//            '__token__'  => 'token1',
        ]);

        if(!$validate->batch()->check($data)){
            $message = $validate->getError();
            return json(['status'=>0,'token'=>Request::token(), 'message'=>$message['name']]);
        }

        return json(['status'=>1,'token'=>Request::token(),'message'=>'提交成功']);

//        echo session('__token__');
//        var_dump($name);
    }

    public function sess()
    {
        session_id('qmmvg5g5h57baabhrhqg3q8m7l');
        echo session('user');
    }
}