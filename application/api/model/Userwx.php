<?php
/**
 * Created by PhpStorm.
 * User: 柏林
 * Date: 20/3/23
 * Time: 10:50
 */
namespace app\api\model;
use think\Model;

class Userwx extends Model{
    protected $table = 'furniture_userwx';
    public function getUserByOpenID($open_id){
        $res=$this->where("open_id",$open_id)->find();
        return $res;
    }
    // 保存数据
    public function saveData($data){
        $res=$this.$this->allowField(true)->save($data);
        if($res===1){
            return $res;
        }
    }

    public function getDataList($query){
        $page = $query["page"];
        $pageSize = $query["pageSize"];
        $start = ($page-1)*$pageSize;
        $data = $this->limit($start,$pageSize)->select();
        return $data;
    }

    public function getTotal(){
        return $this->count();
    }

}