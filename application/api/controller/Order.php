<?php

namespace app\api\controller;

use think\Controller;
use think\Request;

class Order extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $query = input("get.");
        $model = model("order");
        $data = $model->getDataList($query);
        $total = $model->getTotal($query);
        return json([
           "msg"=>"查询成功",
            "code"=>200,
            "data"=>$data,
            "total"=>$total
        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        // 接收前台的数据
        $body = input("post.");
        // 更改字段
        $data = [
          "number"=>time(),
          "state"=>$body["state"],
          "uid"=>$body["uid"],
          "aid"=>$body["aid"],
          "total"=>$body["total"],
          "backNote"=>$body["backNote"]
        ];
        // 保存订单
        $orderModel = model("order");
        // 插入操作
        $order = $orderModel->insertData($data);

        $n = 0;
        // 保存商品信息
        foreach ($body["goods"] as $v ){
            $data = [
              "oid"=> $order->id,
              "name"=>$v["name"],
              "price"=>$v["price"],
              "count"=>$v["count"],
              "color_id"=>$v["sku"]["id"],
              "color_name"=>$v["sku"]["name"],
              "gid"=>$v["id"],
                "thumb"=>$v["thumb"]
            ];

           $goods =  new \app\api\model\Ordergoods();
            $r = $goods->save($data);
            if($r===1){
                $n++;
            }
        }
        if ($n===count($body["goods"])){
            return json(["msg"=>"提交成功","code"=>200]);
        }else{
            return json(["msg"=>"提交失败","code"=>1200]);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $data = input("put.");
        $model = model("order");
        $r= $model->updateData($data,$id);
        if ($r==1){
            return json([
                "msg"=>"更新成功",
                "code"=>200
            ]);
        }else{
            return json([
                "msg"=>"更新失败",
                "code"=>1200
            ]);
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
