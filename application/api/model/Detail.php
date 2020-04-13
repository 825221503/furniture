<?php

namespace app\api\model;

use think\Model;

class Detail extends Model
{
    protected $name = 'detail';
    protected $autoWriteTimestamp = true;
    // 获取商品详细信息
    public function getDetail($query){
        $where =[];
        if (isset($query['gid'])){
            $where['gid']=$query['gid'];
        }
        $data = $this->where($where)->select();
        return $data;
    }
    // 添加商品详细信息
    public function insertDetail($body){
        $this->data($body);
        $r = $this->allowField(true)->save();
        return $r;
    }
    // 根据id获取商品详细信息
    // 查询单条商品数据的方法
    public function getOneDetail($id){
        $r = $this->where("id",$id)->find();
        return $r;
    }
    // 更新编辑商品详细数据
    public function updateDetail($body,$id){
        $r = $this->allowField(true)->save($body,['id',$id]);
        return $r;
    }
    // 更新编辑数据
    public function updateType($data,$id){
        $r = $this->save($data,['id'=>$id]);
        return $r;
    }
     // 删除商品详细数据
    public function deleteDetail($id){
        $data = $this->where('id',$id)->find();
        if(!isset($data)){
            return 0;
        }
        $r = $data->delete();
        return $r;
    }

}
