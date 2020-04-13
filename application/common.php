<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function checkToken(){
    if(!isset($_SERVER["HTTP_X_ACCESS_TOKEN"])){
        json([
            "msg"=>"缺少token信息",
            "code"=>"1006"
        ])->send();
        exit();
    }else{
        $paLoad =\think\JWT::verify($_SERVER["HTTP_X_ACCESS_TOKEN"],"");
        if($paLoad===false){
            json([
                "msg"=>"token信息错误",
                "code"=>"1007"
            ])->send();
            exit();
        }
    }
}