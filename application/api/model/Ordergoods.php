<?php

namespace app\api\model;

use think\Model;

class Ordergoods extends Model
{
    protected $name = "order_goods";


//    public function insertData($data){
//       $obj=self::create($data);
//       if(isset($obj)){
//           return 1;
//       }
//    }
    public function order()
    {
        return $this->belongsTo("order","oid")->bind("uid,state");
    }

    public function getDataList($query){
        $page = $query["page"];
        $pageSize = $query["pageSize"];
        $start = ($page-1)*$pageSize;
        $where =[];
        if (isset($query['uid'])){
            $where['uid']=$query['uid'];
        }
        if (isset($query['state'])){
            $where['state']=$query['state'];
        }
        $where2 =[];
        if (isset($query['oid'])){
            $where2['oid']=$query['oid'];
        }
        $data = $this->hasWhere("order",$where)->with("order")->where($where2)->limit($start,$pageSize)->select();
        return $data;
    }
}
