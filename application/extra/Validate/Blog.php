<?php
namespace app\api\validate;

use think\Validate;

class Blog extends Validate{

    protected $rule = [
    'name'=>'require',
    'title'=>'require',
    'status'=>'require|between:0,1'
];
    protected $message = [
        'name.require'=>'name为必填字段',
        'title.require'=>'title为必填字段',
        'status.require'=>'state为必填字段',
        'status.between'=>'state请输入正确的状态码'
    ];
    protected $scene = [
        'insert'=>['name','title','status'],
        'update'=>['name']
    ];
}