<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\facade\Route;
//Route::get('think', function () {
//    return 'hello,ThinkPHP5!';
//});

//Route::get('hello/:name',function ($name){
//    return  'hello '. $name;
//});

//Route::get('hello/:name', 'index/hello');
//Route::get('detail/:id', 'Address/detail', ['ext'=>'html'])->name('de');
//Route::get('search/:id/:uid', 'index/Address/search');
//Route::get('search/:id/[:uid]', 'index/Address/search');
//Route::get('url', 'Address/url');

//Route::get('user/:id', 'Address/getUser')->model('id', 'app\index\model\Test');

//Route::controller('address','Address');

//Route::group('address', [
//    'detail-:id'    =>  'Address/detail',
//    'one'    =>  'Address/getOne',
//    'two'    =>  'Address/getTwo',
//]);
//Route::group('add', function (){
//    Route::get('detail/:id', 'Address/detail');
//    Route::get('one', 'Address/getOne');
//    Route::get('two', 'Address/getTwo');
//    Route::miss('Address/miss');
//});

//Route::get('address', 'Address/index')->allowCrossDomain();;

//Route::miss('public/miss');


//Route::domain('test.com',function (){
//    Route::get('address','Address/index');
//});

//Route::get('rdc', 'Rely/rdc');
//Route::get('edit/:id', 'Rely/edit');
//Route::get('ad', 'Address/index');


//Route::get('test/:id', 'Inject/test1')->middleware(app\http\middleware\Check::class, '哈哈');
//Route::get('test/:id', 'Inject/test1')->middleware('Auto', '233');
//Route::get('test/:id', 'Inject/test1')
//    ->middleware([
//    'Auto:哈哈',
//    'Check:233'
//]);

//路由验证+
//Route::get('read/:id', 'Check/read')->validate('app\index\validate\User','route');
Route::get('read/:id', 'Check/read')->validate([
    'id'    =>  'number|between:1,10',
//    'status'    =>  function($value){
//        return $value!=1 ? '状态不正确' : true;
//    },
], 'edit',[
    'id.between'    =>  '数字必须在1-10里面',
], true);



return [

];
