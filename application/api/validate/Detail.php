<?php

namespace app\api\validate;

use think\Validate;

class Detail extends Validate
{
    protected $rule=[
        'gid|number'=>'require',
        'banner'=>'require',
        'message'=>'require',
        'did|number'=>'require',
        'content'=>'require'
    ];
    protected $message=[
        'gid.require'=>'请输入商品id',
        'gid.number'=>'商品id为数值型',
        'banner.require'=>'请输入轮播图地址',
        'message.require'=>'请输入商品详细信息',
        'did.require'=>'请输入配送模板id',
        'did.number'=>'模板id是数值型',
        'content.require'=>'请输入富文本信息'
    ];
    protected $scene=[
        'insert'=>['gid','banner','message','did','content'],
        'update'=>['gid','banner','message','did','content']
    ];
}
