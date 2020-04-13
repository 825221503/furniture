<?php
namespace app\api\model;
use think\Model;
use traits\model\SoftDelete;
class Type extends Model
{
    protected $name = 'type';
    protected $autoWriteTimestamp = true;
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    // 查询所有的分类数据
    public function getAllType($query){
        $where = [];
        if (isset($query['pid'])){
            $where['pid'] = $query['pid'];
        }
        if(isset($query["level"])){
            $where["pid"]=["<>",0];
        }
        $order = "id";
        if (isset($query["status"])){
            $order = "status";
        }
        $r =  $this->where($where)->order($order,"asc")->select();
        return $r;
    }
    // 用来根据用户名获取数据的方法
    public function getDateByName($typename){
        $r = $this->where('typename',$typename)->find();
        return $r;
    }
    // 新增数据的方法
    public function insertType($body){
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
    public function updateType($data,$id){
        $r = $this->save($data,['id'=>$id]);
        return $r;
    }
    // 删除数据
    public function deleteType($id){
        $data = $this->where('id',$id)->find();
        if(!isset($data)){
            return 0;
        }
        $r = $data->delete();
        return $r;
    }
}
