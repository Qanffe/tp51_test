<?php
namespace app\index\controller;

//use app\common\base\BaseController;
//class Rely extends BaseController
//{
//    public function index()
//    {
//        return $this->request->param('id');
//    }
//}

//use think\Request;
//class Rely
//{
//    public function index(Request $request)
//    {
//        return $request->param('name');
//    }
//}


use think\Request;
class Rely
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function index()
    {
        echo date('Y-m-d H:i:s',time());
        echo input('param.name','err');
        return $this->request->param('name');
    }

    public function rdc()
    {
//        return redirect('https://www.baidu.com/');
//        echo '1';
//        echo url('rely/edit',['id'=>6]);
//        return redirect('rely/edit',['id'=>6]);
//        return redirect('address/index');
//        return redirect('edit', ['id'=>6]);
//        return redirect('edit')->params(['id'=>88]);


    }

    public function edit($id)
    {
        return 'edit: '.$id;
    }

    
    public function dow()
    {
        return download('./static/img/Nord Day.png', 'test');
    }

    public function test_dow()
    {
        $data = '测试文件';
        return download($data, 'cs.txt', true);
    }

}


//use think\facade\Request;
//class Rely
//{
//    public function index()
//    {
//        return Request::param('name');
//    }
//}

//class Rely
//{
//    public function index()
//    {
//        return request()->param('name');
//    }
//}