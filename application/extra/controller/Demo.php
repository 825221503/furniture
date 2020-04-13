<?php
namespace app\api\controller;

use think\Controller;
use think\controller\Rest;
// 定义api restful api 一种开发风格
class Demo extends rest{
    public function demo(){
//        dump($this->method);
        switch ($this->method){
            case 'get':return $this->get();
            case 'post':return $this->post();
            case 'put':return $this->put();
            case 'delete':return $this->delete();
        }
    }

    private function get(){
        return '获取操作';
    }
    private function post(){
        return '新增操作';
    }
    private function put(){
        return '更新操作';
    }
    private function delete(){
        return '删除操作';
    }
}