<?php

namespace app\api\validate;

use think\Validate;

class Users extends Validate
{
    protected $rule = [
        'page'=>'require|number',
        'pageSize'=>'require|number',
    ];
    protected $message = [
        'page.require'=>'请输入当前页码',
        'page.number'=>'页码必须为数字',
        'pageSize.require'=>'请输入当前每页的条数',
        'pageSize.number'=>'每页的条数必须为数字',
    ];
    protected $scene = [
        'select'=>['page','pageSize'],
    ];
}