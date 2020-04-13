<?php
namespace app\api\controller;
// 数据的查询
// 1. 静态方法 get(主键)
// 2. 静态方法 get(查询的条件);
// 3. 静态方法 get(函数)
// 4. 实例化模型，然后调用响应的查询方法
use app\api\model\Goods;
use think\Db;
use app\api\model\Goods as GoodsModel;
class Index {
    public function test(){
        $data=Db::table('name')->select();
        dump($data);
    }
    public function getGoods(){
//        $goods = new GoodsModel;
//        dump($goods);
//        $data = GoodsModel::get(1);
//        dump($data->name);
//        $goods = model("goods");
//        dump($goods);
//        $data = Goods::get(['name'=>'手机']);
//        dump($data);
//          $data = Goods::get(function ($query){
//              return $query->where('name','手机');
//          });
//          dump($data->name);
//            $goods = new GoodsModel;
//            $data = $goods->where('id','2')->find();
//            dump($data);

            // 查询多个
            // 1. 静态方法
//            $dataList = Goods::all('1,2');
//            foreach($dataList as $V){
//                dump($V->name);
//            }
            // 2. 静态方法 all(查询的条件)
//            $dataList=Goods::all(['state'=>1]);
//            foreach ($dataList as $V){
//                dump($V->name);
//            }
            // 3. 实例化
//                $goods = new GoodsModel;
//                 $dataList = $goods->where('state',1)->select();
//                foreach ($dataList as $V){
//                 dump($V->name);
//            }
            // 闭包查询
            // 直接调用模型身上的静态方法
//            $data = Goods::where('id',1)->find();
//            dump($data->name);
            // 条件查询
//            $price = Goods::where('id',1)->value('price');
//            dump($price);
//                $priceList = Goods::where('state',1)->column('name','price');
//                dump($priceList);
                // 根据某个字段去查询
//            $data = Goods::getByName('电脑');
//            dump($data->name);
//        $goods = new GoodsModel();
        $obj = model('Goods');
        dump($obj->getGoods());
    }
    public function insertGoods(){
        // 插入数据的第一种方式
//        $obj= model ('Goods');
//        $obj->name="TEST";
//        $obj->price=199;
//        $obj->create_time=time();
//        $obj->update_time=time();
//        $obj->state=1;
//        $obj->tid= 3;
//        $r = $obj->save();
//        dump($r);
        // 插入数组
//        $body= input('post');
//        $body['create_time']=time();
//        $body['update_time']=time();
//        $obj= model ('Goods');
//        $obj->data($body);
//        $r = $obj->allowField(true)->save();
//        dump($r);
        // 3. 插入多条数据
//        $dataList = [
//            [
//                'name'=>'商品1',
//                'price'=>100,
//                'create_time'=>time(),
//                'update_time'=>time(),
//                'state'=>1,
//                'tid'=>1
//            ],
//            [
//                'name'=>'商品2',
//                'price'=>100,
//                'create_time'=>time(),
//                'update_time'=>time(),
//                'state'=>1,
//                'tid'=>1
//            ]
//        ];
//        $obj=model('Goods');
//        $r = $obj->saveAll($dataList);
//        dump($r);
        // 调用模型来插入
//        $body = input('post.');
//        $body['create_time']=time();
//        $body['update_time']=time();
//        $obj= model('Goods');
//        $newObj = $obj->inserGoods($body);
//        dump($newObj);
    }
    public function updateData(){
        // 1. 先取数据再更新
//        $goods = model('Goods');
//        $r=$goods->updateGoods(['id'=>1,'name'=>'耳机']);
//        dump($r);
        // 2. 实例化  直接更新
//        $goods = model('Goods');
//        $r=$goods->save(['name'=>'空调'],['id'=>2]);
//        dump($r);
        // 3. 通过数据库类更新数据
//        $goods = model('Goods');
//        $r = $goods->where('id',2)->update(['price'=>100]);
//        dump($r);
        // 4. 借助于 isupdate()和save()
        $goods = model('Goods');
        $r=$goods->isUpdate(true)->save(input('post.'));
        dump($r);
    }
    public function deleteDara($id){
        // 1.
        $goods = model('Goods');
        $r = $goods->deleteGoods($id);
        dump($r);
    }
//    public function getState($id){
//        $obj = model('Goods');
//        $r = $obj->getSomeGoods($id);
//        dump($r->toArray());
//        dump($r->getData());
//    }
    //  只读字段
    public function getSomeGoods(){
        $query = input('get.');
        $model = model('Goods');
        $obj = $model->getSomeGoods($query["id"]);
        dump($obj->toArray());
        dump($obj->Detail->content);
        dump($obj->type->typename);
//        dump($obj->name);
//        dump($obj['name']);
//        dump($obj->hidden(['create_time'])->append(['state_text'])->toArray());
//        dump($obj->visible(['id'])->toArray());
    }
    // 查询范围的定义
    public function getSellGoods(){
        $r=Goods::scope('onsell')->select();
        dump($r);
    }
}

