<?php

namespace app\api\model;

use think\Model;

class UserAddress extends Model
{
    protected $name = 'user_address';
    // 自动写入时间戳
//    protected $autoWriteTimestamp = true;
//    protected $resultSetType = 'collection';
//    protected $insert =[
//        // 插入默认为1
//        'status'=>1,
//    ];
//    use SoftDelete;
//    protected $deleteTime = 'delete_time';
    // 查询分页数据
    public function getDataList($query){
        $data = $this->where("uid",$query["uid"])->select();
        return $data;
    }
    // 数据的总量
    public function getTotal(){
        return $this->count();
    }
    // 获取轮播图列表
    public function getBanner(){

        return $this->select();
    }
    // 添加轮播图
    public function saveBanner($data){

        $uid = $data['uid'];
        $defalut = $this->where(['uid'=>$uid,"default"=>1])->find();
        if (isset($defalut)){
            $defalut->default=0;
            $defalut->allowField(true)->save();
        }
        $this->data($data);
        $r = $this->allowField(true)->save();
        return $r;
    }
    // 获取单条轮播图
    public function getOneBanner($id){
        $r = $this->where('id',$id)->find();
        return $r;
    }
    // 修改单条轮播图
    public function updateBanner($data,$id){

        $uid = $data['uid'];
        $defalut = $this->where(['uid'=>$uid,"default"=>1])->find();
        if (isset($defalut)&&$defalut->id!==$id){
            $defalut->default=0;
            $defalut->allowField(true)->save();
        }

        $r = $this->allowField(true)->save($data,['id'=>$id]);
        return $r;
    }
    // 删除轮播图
    public function deleteBanner($id){
        $data = $this->where('id',$id)->find();
        if(!isset($data)){
            return 0;
        }
        $r = $data->delete();
        return $r;
//        $r = self::destroy($id);
//        return $r;
    }
}
