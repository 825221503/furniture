<?php
namespace app\api\model;

use think\Model;
use traits\model\SoftDelete;
class Goods extends Model {
    protected $table = 'goods';
    protected $autoWriteTimestamp = true;
//    protected $readonly = ['tid'];
//    protected $resultSetType = 'collection';
    // 使用软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    // 类型转换
    protected $type = [
        'price'=>'integer'
    ];
    public static function init(){
        self::event('before_insert',function ($obj){
            if ($obj->state==0){
                return false;
            }
        });
    }
    // 自动完成
//    protected $insert = ['state' => 1];
    public function test(){

    }
    public function getGoods(){
       $data= $this->where('state',1)->select();
       $count = $this->where('state',1)->count();
       return ['data'=>$data,'count'=>$count];
    }
    public function inserGoods($data){
        return self::create($data);
    }
    public function updateGoods($data){
//         $obj = self::get($data['id']);
        $obj = $this->where('id',$data['id'])->find();
        $obj->name = $data['name'];
        $newObjs = $obj->save();
        return $newObjs;
    }
    public function deleteGoods($id){
//       $odj= self::get($id);
//       return $odj->delete();

       return self::destroy($id);
    }
    public function delType($tid){
        return self::destroy(['tid'=>$tid]);
    }
    public function getSomeGoods($id){
        $obj= self::get($id);
        return $obj;
    }
    // 获取器
    public function getStateAttr($value){
        $stateArr = [0=>'下架',1=>'上架'];
        return $stateArr[$value];
    }
    public function getStateTextAttr($value,$data){
        $stateArr=  [0=>'下架',1=>'上架'];
        return $stateArr[$data['state']];
    }
    // 修改器的设置
    public function setNameAttr($value){
        return strtolower($value);
    }
    // 查询范围
    public function Onsell($query){
        return $query->where('state',1);
    }
    // 模型一对一关联
    public function detail(){
        return $this->hasOne('Detail','gid');
    }
    // 建立模型的多对一关联
    public function type(){
        return $this->belongsTo('type','tid');
    }
}