<?php
namespace app\index\model;

use think\Model;
use think\model\concern\SoftDelete;

class Test extends Model
{
    use SoftDelete;

    //开启自动时间戳
    protected $autoWriteTimestamp = true;
    //定义时间戳字段名
    protected $createTime = 'time';
    protected $updateTime = 'up_time';

    //设置只读字段
    protected $readonly = ['status'];

    //设置返回值数据类型
    protected $type = [
        'time'    =>  'timestamp',
    ];

    //软删除设置
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;//默认为0

//    public $name = 'test_name';

    //获取器
    public function getStatusAttr1($value)
    {
        $status = [
            0 => '正常',
            -1 => '黑名单',
            1 => 'vip',
        ];
        return $status[$value];
    }

    public function getNotingAttr($value, $data)
    {
        $status = [
            0 => '正常',
            -1 => '黑名单',
            1 => 'vip',
        ];
        return $status[$data['status']];
    }

    //修改器
    public function setTitleAttr($value)
    {
        return strtoupper($value);
    }

    //搜索器
    public function searchTitleAttr($query, $value, $data)
    {
        $query->where('title', 'like', $value.'%');
        if (isset($data['sort']))
        {
            $query->order($data['sort']);
        }
    }
    public function searchTimeAttr($query, $value)
    {
        $query->where('time', 'between', [$value[0], $value[1]]);
    }

    //添加查询范围
    public function scopeStatus($query, $data=0)
    {
        $query->where('status',$data)->field('id,title,status');
    }
    public function scopeTitle($query, $data)
    {
        $query->where('title',$data)->field('time');
    }
}