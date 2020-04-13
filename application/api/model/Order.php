<?php

namespace app\api\model;

use think\Model;

class Order extends Model
{
    protected $name = "order";
    protected $autoWriteTimestamp = "true";
    // 定义1对1关联
    public function addressMessage(){
        return $this->belongsTo("UserAddress","aid","id")->bind("province,city,area,address");
    }
    // 定义一个1对多关联
    public function goods(){
        return $this->hasMany("Ordergoods",'oid');
    }
    public function insertData($data){
        $this->allowField(true)->save($data);
        // 返回的是影响行数 1 $this是实例订单模型对象实例 实例 添加成功之后这个实例就相当于通过id获取的对象一样
        // 当前成功之后的对象 包括id
        return $this;
    }

    public function getDataList($query){
        $page = $query["page"];
        $pageSize = $query["pageSize"];
        $where=[];
        if(isset($query["state"])){
            $where["state"]=$query["state"];
        }
        $start = ($page-1)*$pageSize;
        $data = $this->with('addressMessage')->with('goods')->limit($start,$pageSize)->where($where)->order("create_time","desc")->select();
        return $data;
    }
    public function getTotal($query){
        $where = [];
        if (isset($query["state"])){
            $where["state"]=$query["state"];
        }
        return $this->where($where)->count();
    }
    public function updateData($data,$id){
        $r = $this->isUpdate(true)->save($data,["id"=>$id]);
        return $r;
    }
}
