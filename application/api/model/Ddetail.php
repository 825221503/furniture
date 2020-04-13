<?php

namespace app\api\model;

use think\Model;
use traits\model\SoftDelete;
class Ddetail extends Model
{
    protected $name = 'delivery_detail';
    protected $autoWriteTimestamp = true;
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    // 关联一下配送模板表
    public function Dtemplate(){
        return $this->belongsTo('dtemplate','did')->field('id,name');
    }
    // 查询配送信息详细列表
    public function getDetail($query){
//        $page = $query['page'];
//        $pageSize = $query['pageSize'];
//        $start = ($page-1)*$pageSize;
//        $where = $this->getOptionsTotal($query);
//        $r = $this->with('dtemplate')->where($where)->limit($start,$pageSize)->select();
//        return $r;
        $where = [];
        if (isset($query['did'])){
            $where['did'] = $query['did'];
        }
        $r = $this->where($where)->select();
        return $r;
    }
    // 配送详细信息总条数获取
    public function getTotal($query){
        $where = $this->getOptionsTotal($query);
        return $this->where($where)->count();
    }
    // 生成查询条件
    public function getOptionsTotal($query){
        $where = [];
        if (isset($query['areas'])){
            $name = $query['areas'];
            $where["areas"]=["like","%$name%"];
        }
        return $where;
    }
    // 查询单条配送详细信息的方法
    public function getOneDdetail($id){
        $r = $this->where("id",$id)->find();
        return $r;
    }
    // 根据配送区域查询数据
    public function getAreaName($name){
        $r = $this->where("areas",$name)->find();
        return $r;
    }
    // 插入配送详细信息
    public function insertDdetail($body){
        $this->data($body);
        $r = $this->allowField(true)->save();
        return $r;
    }
    // 更新编辑数据
    public function updateDetail($body,$id){
        $r = $this->save($body,['id'=>$id]);
        return $r;
    }
    // 删除配送详细信息
    public function deleteDetail($id){
        $data = $this->where('id',$id)->find();
        if (!isset($data)){
            return 0;
        }
        $r = $data->delete();
        return $r;
    }
}
