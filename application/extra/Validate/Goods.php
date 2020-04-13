<?php
namespace app\api\validate;

use think\Validate;

class Goods extends Validate{

    protected $rule = [
      'name'=>'require',
      'price'=>'require|number',
      'state'=>'require|between:0,1'
    ];
    protected $message = [
      'name.require'=>'name为必填字段',
      'price.require'=>'price为必填字段',
      'price.numaber'=>'price为数字类型',
      'state.require'=>'state为必填字段',
      'state.between'=>'state请输入正确的状态码'
    ];
    protected $scene = [
      'insert'=>['name','price','state'],
      'update'=>['name']
    ];
}