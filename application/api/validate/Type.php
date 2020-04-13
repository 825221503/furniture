<?php
/**
 * Created by PhpStorm.
 * User: 柏林
 * Date: 20/2/13
 * Time: 15:36
 */
namespace app\api\validate;

use think\Validate;

class Type extends Validate{

    protected $rule = [
      'typename'=>'require',
      'thumb'=>'require',
        'pid'=>'require|number',
        'sort'=>'require|number',
        'status'=>'require|between:0,1'
    ];
    protected $message = [
        'typename.require'=>'请输入分类名称',
        'thumb.require'=>' 请输入分类图片',
        'pid.require'=>' 请传入上级栏目id',
        'pid.number'=>'上级栏目id必须为数值类型',
        'sort.require'=>'请传入排序',
        'sort.number'=>'排序必须为数值类型',
        'status.require'=>'请传入状态',
        'status.between'=>'状态为0或1',
    ];
    protected $scene = [
        'insert'=>['typename','thumb','pid','sort','status']
    ];
}