<?php
namespace app\index\controller;

use app\common\base\BaseController;
use app\index\model\Test;
use think\Db;
use app\index\model\User;

class Index extends BaseController
{
    public function index()
    {


//        $result = Db::table('test_user')->data(['name'=>'admin','pwd'=>md5(1),'createtime'=>time()])->insert();
//        var_dump($result);
//        $data = Db::name('user')->select();

//        $data = Test::where('id',3)->find();

//        Test::withAttr('status',function ($value){
//            $status = [
//                0 => '正常',
//                -1 => '黑名单',
//                1 => 'vip',
//            ];
//            return $status[$value];
//        });

        $data = Test::withSearch(
            [
                'title',
                'time'
            ],
            [
                'title' => '老',
                'time'  => [1599034771,time()],
                'sort'  => ['id'=>'desc']
            ]
        )->select();
//        return Db::getLastSql();
        return json($data);
    }

    public function index2(){
        echo 3;
    }

    public function select()
    {
        $data = Test::get(7);
        var_dump($data->status);
        var_dump($data->time);
    }

    public function add(){
        $test = new Test();
        $add = $test->save([
            'title' => 'hhww',
        ]);
        echo $test->id;

//        var_dump($add);
    }

    public function delete(){
//        $data = Test::get(1);
//        $data->delete();

//        $data = Test::destroy();

        //闭包删除
        Test::destroy(function ($query){
           $query->where('id','>=','4');
        });

//        var_dump($data);
    }

    public function update()
    {
//        $result = Test::where('id','=',3)->update([
//            'title' => '老王2222',
//            'status' => 1
//        ]);

        $data = Test::get(3);
        $data->title = 'lw22';
        $data->status = 1;
        echo $data->save();
//        return $result;
    }

    public function queryscope()
    {
//        $result = Test::scope('status,title')->select();
        $result = Test::status(1)->title('老王')->select();
        return json($result);
    }

    public function json()
    {
//        $test = new Test();
//        $add = $test->save([
//        'title' => 'ddd',
//        'list' => ['title'=>'233','type'=>1],
//    ]);
//        echo $add;

//        $result = Db::name('test')->json(['list'])->where('id',17)->find();
//        $result = Test::json(['list'])->where('id',17)->find();
//        $result = Test::json(['list'])->where(['list->title'=>'233'])->select();
//        return Db::getLastSql();

//        $data['list'] = ['title'=>'老王','type'=>2];
//        $result = Test::where('id',17)->update($data);

//        $data['list->type'] = 1;
        $data['list->title'] = 'laowang';
        $result = Test::where('id',17)->update($data);
        return json($result);
    }

    public function softdelete()
    {

        $result =  Test::destroy(3,true);



//        $result = Test::onlyTrashed()->select();
//        $result->restore();
        echo Db::getLastSql();
//        return json($result);
    }

    public function test()
    {
        session('user', 'laowang'.date('s',time()));
//        session(null);

//        if(isset($_COOKIE[session_name()])){
//            //删除包含Session ID的cookie，注意第四个参数一定要和php.ini设置的路径相同
////            setcookie(session_name(),'',time()-3600,'/');
//            cookie(session_name(), null);
//        }

//        var_dump($_COOKIE);
//        session_id('qmmvg5g5h57baabhrhqg3q8m7l');

        var_dump(session('user'));
    }

    //多语言测试
    public function lang()
    {
        //通过url,lang=zh-cn
        echo lang('require_name');
        echo '<br>';
        echo lang('email_error');
    }
}
