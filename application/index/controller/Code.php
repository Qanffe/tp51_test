<?php


namespace app\index\controller;

//验证码
use app\common\base\BaseController;
use think\captcha\Captcha;

class Code extends BaseController
{
    public function index()
    {
        return $this->fetch();
    }

    public function check()
    {
        $data = [
            'code'  =>  request()->param('code'),
        ];

        $result = $this->validate($data, [
            'code|验证码'  =>  'require|captcha'
        ]);
        dump($result);
    }

    public function show()
    {
        $config = [
            //字体大小
             'fontSize' => 50,
            //验证码位数
             'length' => 3,
            //验证码杂点
             'useNoise' => true,
        ];
        $captcha = new Captcha($config);
        return $captcha->entry(1);//直接生成验证码
    }

    public function check1()
    {
        $captcha = new Captcha();
        dump($captcha->check(request()->param('code'),1));
    }
}