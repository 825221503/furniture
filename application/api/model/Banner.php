<?php
/**
 * Created by PhpStorm.
 * User: 柏林
 * Date: 20/2/12
 * Time: 17:44
 */
namespace app\api\model;

use think\Model;
use traits\model\SoftDelete;

class Banner extends Model{
    protected $table = 'furniture_banner';
    // 自动写入时间戳
    protected $autoWriteTimestamp = true;
//    protected $resultSetType = 'collection';
    protected $insert =[
        // 插入默认为1
        'status'=>1,
    ];
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    // 查询分页数据
    public function getDataList($page,$pageSize){
        $start = ($page-1)*$pageSize;
        $data = $this->order('sort','ASC')->limit($start,$pageSize)->select();
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