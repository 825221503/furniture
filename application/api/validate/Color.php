<?php
/**
 * Created by PhpStorm.
 * User: 柏林
 * Date: 20/2/13
 * Time: 19:58
 */
namespace app\api\validate;

use think\Validate;

class Color extends Validate{

    protected $rule = [
        'name'=>'require',
        'value'=>'require',
        'gid'=>'require|number',
        'sort'=>'require|number',
        'store'=>'require|number'
    ];
    protected $message = [
        'name.require'=>'请输入规格名称',
        'value.require'=>' 请输入规格值',
        'gid.require'=>' 请传入商品id',
        'gid.number'=>'商品id必须为数值类型',
        'sort.require'=>'请传入排序',
        'sort.number'=>'排序必须为数值类型',
        'store.require'=>'请传入库存数量',
        'store.number'=>'库存数量必须为数值类型',
    ];
    protected $scene = [
        'insert'=>['name','value','gid','sort','store']
    ];
}