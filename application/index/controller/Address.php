<?php
namespace app\index\controller;

use app\common\base\BaseController;
use think\App;


/**
 * Class Address
 * @package app\index\controller
 * @route('adr')
 */
class Address extends BaseController
{
    public function index()
    {
        return 'index';
    }

    public function detail($id){
        return $id;
    }

    public function search($id, $uid='')
    {
        return $id . '<br>' .$uid;
    }

    public function url()
    {
//        return url('address/detail',['id'=>23]);
        return url('de',['id'=>23]);
    }

    public function getUser(app\index\model\Test $user){
        return $user;
    }

    /**
     * @return string
     * @route('add/one')
     * ->ext('php')
     *
     */
    public function getOne()
    {
        return 'getOne';
    }

    public function getTwo()
    {
        return 'getTwo';
    }

    public function miss()
    {
        return 'miss';
    }
}