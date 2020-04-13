<?php
/**
 * Created by PhpStorm.
 * User: 柏林
 * Date: 20/3/23
 * Time: 16:55
 */
namespace app\api\validate;

use think\Validate;

class UserAddress extends Validate{

    protected $rule = [
        'uid'=>'require|number',
        'type'=>'require',
        'province'=>'require',
        'city'=>'require',
        'area'=>'require',
        'address'=>'require',
        'connect_name'=>'require',
        'connect_phone'=>'require|number',
        "areaCode"=>"require"
    ];
    protected $message = [
        'uid.require'=>'请输入当前用户id',
        'uid.number'=>'用户id必须为数字',
        'type.require'=>'请选择所属分类',
        'province.require'=>'请输入所在省',
        'city.require'=>'请输入所在市',
        'area.require'=>'请输入所在区',
        'address.require'=>'请输入所在的地址',
        'connect_name.require'=>'请输入姓名',
        'connect_phone.require'=>'请输入电话号码',
        'connect_phone.number'=>'请输入电话号码必须为数字',
    ];
    protected $scene = [
        'select'=>['uid'],
        'insert'=>['uid','type','province','city','area','address','connect_name','connect_phone','areaCode'],
        'update'=>['uid','type','province','city','area','address','connect_name','connect_phone']
    ];

}