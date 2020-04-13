<?php

namespace app\api\model;

use think\Model;
use traits\model\SoftDelete;
class Color extends Model
{
    protected $name = 'color';
    protected $autoWriteTimestamp = true;
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    // 关联一下商品模型
    public function color(){
        return $this->belongsTo('goods','gid')->field("id,name,thumb");
    }
    // 查询所有的规格数据
    public function getAllColor($query){
        $where = [];
        if (isset($query['gid'])){
            $where['gid'] = $query['gid'];
        }
        $r = $this->where($where)->order("sort",'asc')->select();
        return $r;
    }
    // 用来根据规格名获取数据值的方法
    public function getDateByColor($name){
        $r = $this->where('name',$name)->find();
        return $r;
    }
    // 新增数据的方法
    public function insertColor($body){
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
    public function updateColor($data,$id){
        $r = $this->allowField(true)->save($data,['id'=>$id]);
        return $r;
    }
    // 删除数据
    public function deleteColor($id){
        $data = $this->where('id',$id)->find();
        if(!isset($data)){
            return 0;
        }
        $r = $data->delete();
        return $r;
    }
}
