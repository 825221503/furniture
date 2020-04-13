<?php

namespace app\api\model;

use think\Model;
use traits\model\SoftDelete;
class Goods extends Model
{
    protected $name = 'goods';
    protected $autoWriteTimestamp = true;
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    // 关联一下type模型
    public function type(){
        return $this->belongsTo('type','tid')->field("id,typename");
    }

    // 查询商品数据列表
    public function getDataGoods($query){
        $page = $query['page'];
        $pageSize = $query['pageSize'];
        $start = ($page-1)*$pageSize;
        $where = $this->getOptionsTotal($query);
        $r = $this->with("type")->where($where)->limit($start,$pageSize)->order('sort','ASC')->select();
        return $r;
    }
    // 商品总条数获取
    public function getTotal($query){
        $where = $this->getOptionsTotal($query);
        return $this->where($where)->count();
    }
    // 生成查询条件
    public function getOptionsTotal($query){
        $where = [];
        if (isset($query['name'])){
            $name = $query['name'];
            $where["name"]=["like","%$name%"];
        }
        if (isset($query["min_price"])&&isset($query["max_price"])){
            $min = $query["min_price"];
            $max = $query["max_price"];
            $where["special_price"]=["between",[$min,$max]];
        }
        if (isset($query["tid"])){
            $tid = $query['tid'];
            $where["tid"]=$tid;
        }
        if (isset($query["state"])){
            $state = $query["state"];
            $where["state"]=$state;
        }
        if (isset($query["recommend"])){
            $recommend = $query["recommend"];
            $where["recommend"] = $recommend;
        }
        return $where;
    }
    // 查询单条商品数据的方法
    public function getOneGood($id){
        $r = $this->where("id",$id)->find();
        return $r;
    }

    // 根据商品名称查询数据
    public function getGoodName($name){
        $r = $this->where("name",$name)->find();
        return $r;
    }
    // 插入数据
    public function insertGood($body){
        $this->data($body);
        $r = $this->allowField(true)->save();
        return $r;
    }

    // 更新编辑商品数据
    public function updateGood($body,$id){
        $r = $this->allowField(true)->save($body,['id'=>$id]);
        return $r;
    }
    // 删除商品数据
    public function deleteGood($id){
        $data = $this->where('id',$id)->find();
        if(!isset($data)){
            return 0;
        }
        $r = $data->delete();
        return $r;
    }
}
