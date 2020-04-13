<?php

namespace app\api\model;

use think\Model;

class Dtemplate extends Model
{
    protected $name = 'delivery_template';
    protected $autoWriteTimestamp =true;
    // 查询所有的分类数据
    public function getAllTemplate($query){
//        $where = [];
//        if (isset($query['id'])){
//            $where['id'] = $query['id'];
//        }
        $r =  $this->select();
        return $r;
    }
// 获取模板列表
//    public function getTemplate($page,$pageSize){
//        $start = ($page-1)*$pageSize;
//        $data = $this->limit($start,$pageSize)->select();
//        return $data;
//    }
    public function getTemplate(){
//        $start = ($page-1)*$pageSize;
        $data = $this->select();
        return $data;
    }
    // 获取模板总数量
    public function getTotal(){
        return $this->count();
    }
    // 根据模板名称查询数据
    public function getTemplateName($name){
        $r = $this->where("name",$name)->find();
        return $r;
    }
    // 插入数据
    public function insertTemplate($body){
        $this->data($body);
        $r = $this->allowField(true)->save();
        return $r;
    }
    // 查询单条配送模板的方法
    public function getOneTemplate($id){
        $r = $this->where("id",$id)->find();
        return $r;
    }
    // 更新编辑模板数据
    public function updateTemplate($data,$id){
        $r = $this->save($data,['id'=>$id]);
        return $r;
    }
    // 删除模板数据
    public function deleteTemplate($id){
        $data = $this->where('id',$id)->find();
        if(!isset($data)){
            return 0;
        }
        $r = $data->delete();
        return $r;
    }
}
