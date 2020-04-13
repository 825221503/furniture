<?php
/**
 * Created by PhpStorm.
 * User: 柏林
 * Date: 20/2/13
 * Time: 11:10
 */
namespace app\api\validate;

use think\Validate;

class Manager extends Validate{

    protected $rule = [
        'page'=>'require|number',
        'pageSize'=>'require|number',
        'role'=>'require|between:1,2',
        'username'=>'require',
        'status'=>'require|between:0,1'
    ];
    protected $message = [
        'page.require'=>'请输入当前页码',
        'page.number'=>'页码必须为数字',
        'pageSize.require'=>'请输入当前每页的条数',
        'pageSize.number'=>'每页的条数必须为数字',
        'role.require'=>'请传入管理员类型',
        'role.between'=>'请传入正确的管理员类型',
        'username.require'=>'请输入账户名',
        'status.require'=>"请传入管理员状态",
        'status.between'=>'请输入正确的状态值0或1'
    ];
    protected $scene = [
        'select'=>['page','pageSize','role'],
        'insert'=>['username','status']
    ];
}