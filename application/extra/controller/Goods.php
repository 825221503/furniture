<?php
namespace app\api\controller;

use think\Controller;
use think\Validate;
class Goods extends Controller{
    public function test(){
        return 'test ok';
    }
    public function insert(){
        $body = input('post.');
        // 独立验证
//        $validate = new Validate([
//            'name'=>'require'
//        ]);
//        if (!$validate->check($body)){
//            dump($validate->getError())  ;
//            return;
//        }
        $validate = validate('Goods');
        if (!$validate->scene('insert')->check($body)){
            dump($validate->getError())  ;
           return;
        }
        $model = model('Goods');
        $model->data($body);
        $r = $model->save();
        dump($r);
    }
    public function update(){
        $body = input('post.');
        $validate = validate('Goods');
        if (!$validate->scene('update')->check($body)){
            dump($validate->getError());
            return;
        }
    }
}