<?php
use think\Route;
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//];
//Route::resource('banner','api/Banner');
Route::resource("banner","api/Banner");
Route::resource("manager","api/Manager");
Route::resource("type","api/Type");
Route::resource("color","api/Color");
Route::resource("goods","api/Goods");
Route::resource("user","api/User");
Route::resource("detail","api/Detail");
Route::resource("ddetail","api/Ddetail");
Route::resource("dtemplate","api/Dtemplate");
Route::resource("users","api/Users");
Route::resource("UserAddress","api/UserAddress");
Route::resource("order","api/Order");
Route::resource("ordergoods","api/Ordergoods");