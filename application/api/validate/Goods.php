<?php
/**
 * Created by PhpStorm.
 * User: 柏林
 * Date: 20/2/14
 * Time: 11:21
 */
namespace app\api\validate;

use think\Validate;

class Goods extends Validate{

    protected $rule = [
        'page'=>'require|number',
        'pageSize'=>'require|number',
        'name'=>'require',
        'thumb'=>'require',
        'price'=>'require|number',
        'special_price'=>'require|number',
        'tid'=>'require|number',
        'sort'=>'require|number',
        'state'=>'require|between:0,1',
        'recommend'=>'require|between:0,1'
    ];
    protected $message = [
        'page.require'=>'请输入当前页码',
        'page.number'=>'页码必须为数字',
        'pageSize.require'=>'请输入当前每页的条数',
        'pageSize.number'=>'每页的条数必须为数字',
        'name.require'=>'请输入商品名称',
        'thumb.require'=>' 请输入商品图片',
        'price.require'=>'请输入商品价格',
        'price.number'=>'商品价格为数字',
        'special_price.require'=>'请输入商品特价',
        'special_price.number'=>'商品价格为数字',
        'tid.require'=>' 请输入上级商品分类id',
        'tid.number'=>'上级商品分类id必须为数值类型',
        'sort.require'=>'请传入商品排序',
        'sort.number'=>'排序必须为数值类型',
        'state.require'=>'请传入商品状态',
        'state.between'=>'状态为0或1',
        'recommend.require'=>'请输入推荐状态',
        'recommend.between'=>'推荐状态必须为0或1'
    ];
    protected $scene = [
        'select'=>['page','pageSize'],
        'insert'=>['name','thumb','tid','price','special_price','sort','state','recommend']
    ];
}