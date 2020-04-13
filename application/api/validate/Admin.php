<?php
namespace app\api\validate;

use think\Validate;

class Admin extends Validate{

    protected $rule=[
      'username'=>'require',
      'password'=>'require',
        'id'=>'require',
        'oldPassword'=>'require',
        'newPassword'=>'require'
    ];
    protected $message=[
      'username.require'=>'请输入账号',
      'password.require'=>'请输入密码',
        'id.require'=>'请提供id',
        'oldPassword'=>'请提供原始密码',
        'newPassword'=>'请提供新密码'
    ];
    protected $scene=[
      'login'=>['username','password'],
      'update'=>['id','oldPassword','newPassword']
    ];
}