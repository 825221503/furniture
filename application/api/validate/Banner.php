<?php
/**
 * Created by PhpStorm.
 * User: 柏林
 * Date: 20/2/12
 * Time: 17:44
 */
namespace app\api\validate;

use think\Validate;

class Banner extends Validate{

    protected $rule = [
        'page'=>'require|number',
        'pageSize'=>'require|number',
        'thumb'=>'require',
        'gid'=>'require|number',
        'sort'=>'require|number',
        'status'=>'require|between:0,1'
    ];
    protected $message = [
        'page.require'=>'请输入当前页码',
        'page.number'=>'页码必须为数字',
        'pageSize.require'=>'请输入当前每页的条数',
        'pageSize.number'=>'每页的条数必须为数字',
        'thumb.require'=>'thumb为必填字段',
        'gid.require'=>'gid为必填字段',
        'gid.number'=>'gid为数字',
        'sort.require'=>'sort为必填字段',
        'sort.number'=>'sort为数字',
        'status.require'=>'status为必填字段',
        'status.between'=>'显示状态必须为0或1'
    ];
    protected $scene = [
        'select'=>['page','pageSize'],
        'insert'=>['thumb','gid','status','sort'],
        'update'=>['thumb']
    ];
}