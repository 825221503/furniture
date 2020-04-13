<?php

namespace app\api\validate;

use think\Validate;

class Dtemplate extends Validate
{
    protected $rule=[
        'page'=>'require|number',
        'pageSize'=>'require|number',
        'name'=>'require',
    ];
    protected $message=[
        'page.require'=>'请输入当前页码',
        'page.number'=>'页码必须为数字',
        'pageSize.require'=>'请输入当前每页的条数',
        'pageSize.number'=>'每页的条数必须为数字',
        'name.require'=>'请输入模板名称',
    ];
    protected $scene=[
        'select'=>['page','pageSize'],
        'insert'=>['name'],
        'update'=>['gid','banner','messages','did','content']
    ];
}
