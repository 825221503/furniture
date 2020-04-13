<?php

namespace app\api\validate;

use think\Validate;

class Ddetail extends Validate
{
    protected $rule = [
        'page'=>'require|number',
        'pageSize'=>'require|number',
        'did'=>'require|number',
        'areas'=>'require',
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
        'did.require'=>'请输入模板id',
        'did.number'=>'模板id必须为数值型',
        'areas.require'=>' 请输入配送区域',
        'price.require'=>'请输入配送价格',
        'price.number'=>'配送价格为数字',
    ];
    protected $scene = [
        'select'=>['did'],
        'insert'=>['did','areas','price']
    ];
}
