<?php

namespace app\api\model;

use think\Model;

class User extends Model
{
    protected $name = 'user';
    protected $autoWriteTimestamp = true;

    public function getUser(){
        $data = $this->field('id,nick_name,login_time,gender')->select();
        return $data;
    }
    // 用来根据用户名获取数据值的方法
    public function getDateByUser($nick_name){
        $r = $this->where('nick_name',$nick_name)->find();
        return $r;
    }
    // 新增数据的方法
    public function insertUser($body){
        $this->data($body);
        $r = $this->allowField(true)->save();
        return $r;
    }
    // 根据id查询数据
    public function getById($id){
        $r = $this->where('id',$id)->find();
        return $r;
    }
    // 更新编辑数据
    public function updateUser($data,$id){
        $r = $this->allowField(true)->save($data,['id'=>$id]);
        return $r;
    }
    // 删除数据
    public function deleteUser($id){
        $data = $this->where('id',$id)->find();
        if(!isset($data)){
            return 0;
        }
        $r = $data->delete();
        return $r;
    }
}
