<?php

namespace app\common\validate;

use think\Validate;

class User extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
//	    'name|名字'  =>  'require|max:10|checkName:老王',
	    'name|名字'  =>  ['require', 'max'=>10, 'checkName'=>'老王'],
	    'price|价格'  =>  'number|between:1,100',
	    'email|邮箱'  =>  'email',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'name.require'  =>  '名字不能为空',
        'email'  =>  '邮箱格式错误',
        'price.between'  =>  '价格必须在1-100元内',
    ];

    //定义使用场景
    protected $scene = [
        'add'   => ['name', 'price', 'email'],
        'edit'   => ['name', 'price'],
        'rout'   => [],
    ];
//    public function sceneEdit()
//    {
//        return $this->only(['name', 'price'])
//                    ->remove(['name'=>'max|require'])
//                    ->append(['name'=>'number']);
//    }
    public function sceneRoute()
    {
        return $this->remove(['name'=>'require']);
    }


    //自定义验证规则
    protected function checkName($value, $rule, $data)
    {
//        var_dump($value);
//        var_dump($rule);

        return $value!=$rule ? true : '名字不能为老王';
    }
}
