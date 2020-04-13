<?php
namespace app\api\model;

use think\Model;
//use traits\model\SoftDelete;
class Blog extends Model{
    // 自动写入时间戳
    protected $autoWriteTimestamp = true;
    protected $resultSetType = 'collection';
    protected $insert =[
        // 插入默认为1
      'status'=>1,
    ];
//    use SoftDelete;
//    protected $deleteTime = 'delete_time';
    // 字段合法性检测
    protected $field = [
      'id' => 'int',
      'create_time'=>'int',
      'update_time'=>'int',
      'name','title','content',
    ];
    public function getList(){

        return $this->select();
    }
    public function saveData($data){
        $this->data($data);
        $this->allowField(true)->save();
        return;
    }
    public function getOne($id){
       $r = $this->where('id',$id)->find();
        return $r;
    }
    public function updateData($data,$id){
        $r = $this->allowField(true)->save($data,['id'=>$id]);
        dump($r);
        return $r;
    }
    public function deleteData($id){
        $r = $this->where('id',$id)->find();
        $obj = $r->delete();
        return $obj;
//        $r = self::destroy($id);
//        return $r;
    }

}