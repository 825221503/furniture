<?php

namespace app\api\validate;

use think\Validate;

class User extends Validate
{
    protected $rule=[
        'nick_name'=>'require',
        'gender'=>'require',
        'avatar_url'=>'require',
        'phone|number'=>'require',
    ];
    protected $message=[
        'nick_name.require'=>'请输入用户昵称',
        'gender.require'=>'请输入性别',
        'avatar_url.require'=>'请添加头像',
        'phone.require'=>'请输入联系方式',
        'phone.number'=>'联系方式是数值型'
    ];
    protected $scene=[
        'insert'=>['nick_name','gender','avatar_url','phone'],
        'update'=>['nick_name','gender','avatar_url','phone']
    ];
}
