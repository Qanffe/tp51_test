<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

use think\Facade;
use think\facade\Cookie;

//facade门面模式绑定
//Facade::bind('app\facade\Test', 'app\common\Test');
Facade::bind([
    'app\facade\Test'   =>   'app\common\Test'
]);


//设置多语言
Cookie::prefix('think_');
Cookie::set('var', 'en-us');
//限定那些语言包
\think\facade\Lang::setAllowLangList(['zh-cn','en-us','ja-jp']);