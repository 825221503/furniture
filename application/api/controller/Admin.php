<?php
namespace app\api\controller;

use think\Controller;
use think\JWT;

class Admin extends Controller
{
    // 主控制器
    //
    public function test()
    {
        return time();
    }

    // 生成唯一标识方法
    private function createHash()
    {
        return md5(time());
        // 1b452ccc82fca7018b19704fa0d0c37b
    }

    // 生成加密密码的方式
    private function createPassword($password = '123456', $salt = '1b452ccc82fca7018b19704fa0d0c37b')
    {
        // 加盐加密 为了避免用户的密码泄密
        return md5($password . $salt);
        // a1086f50a25f1e9560e6845a2fb1ab47
    }

    // 登录接口
    public function login()
    {
        $body = input('post.');
        $validate = validate('Admin');
        $model = model('Admin');
        if (!$validate->scene('login')->check($body)) {
            return json(['msg' => $validate->getError(), 'code' => 10000]);
        }
        $r = $model->getDataByUsername($body['username']);
        if (isset($r)) {
            $hash = $r->hash;
            // 拿到提交的密码
            $password = $this->createPassword($body['password'], $hash);

            if ($password === $r->password) {
                $login_time = $r->login_time;
                $model->updateLoginTime($r->id);
                if ($r->status === 1) {
                    // 用来生成签名的数据  token
                    $payLoad=[
                        "username"=>$r->username,
                        "role"=>$r->role,
                    ];
                    $token=JWT::getToken($payLoad,"");
                    return json([
                        'msg' => '登录成功',
                        'code' => 200,
                        'id' => $r->id,
                        'username' => $r->username,
                        'role' => $r->role,
                        'login_time' => $login_time,
                        "token"=>$token
                    ]);
                } else {
                    return json([
                        'msg' => '账号暂无权限',
                        'code' => 10001
                    ]);
                }
            } else {
                return json([
                    'msg' => '登录失败',
                    'code' => 10000
                ]);
            }
        } else {
            return json([
                'msg' => '登录失败',
                'code' => 10000
            ]);
        }
    }

    //  修改密码
    public function changePassword()
    {
        // 接收用户提交的数据
        $body = input('post.');
        $model = model('Admin');
        $validate = validate('Admin');
        if (!$validate->scene('update')->check($body)) {
            return json([
                'msg' => $validate->getError(),
                'dode' => 10001
            ]);
        }
        $r = $model->getDataById($body['id']);
        if (isset($r)) {
            $password = $this->createPassword($body['oldPassword'], $r->hash);
            if ($password === $r->password) {
                $newpassword = $this->createPassword($body['newPassword'], $r->hash);
                $res = $model->updatePassword($newpassword, $body['id']);
                if (isset($res)) {
                    return json([
                        'msg' => '修改成功',
                        'code' => 200
                    ]);
                } else {
                    return json([
                        'msg' => '修改失败',
                        'code' => 10001
                    ]);
                }
            } else {
                return json([
                    'msg' => '原始密码错误',
                    'code' => 10001
                ]);
            }
        } else {
            return json([
                'msg' => '用户名不存在',
                'code' => 10001
            ]);
        }

    }

    public function upload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if ($info) {
            // 成功上传后 获取上传信息
            // 输出 jpg
//     echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            $path = $info->getSaveName();
            $path = str_replace("\\", "/", $path);
            echo "/uploads/" . $path;
//     echo "uploads/".$info->getSaveName();
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
//     echo $info->getFilename();
        } else {
            // 上传失败获取错误信息
            echo $file->getError();
        }

    }
   // 富文本图片上传方式
    public function editUpload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if ($info) {
            // 成功上传后 获取上传信息
            // 输出 jpg
//     echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            $path = $info->getSaveName();
            $path = str_replace("\\", "/", $path);
//     echo "uploads/".$info->getSaveName();
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
//     echo $info->getFilename();
            return json([
                "errno" => 0,
                "data" => ["/uploads/" . $path]
            ]);
        } else {
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
    // 模拟微信登录
   public function wxLogin(){
        // 接收用户的code码
        // 微信开放平台
        // 配置appID(来自微信公众平台的信息)  secret_key
        // 向微信服务器发起请求
        // 微信服务器会返回当前用户的信息
        $r=[
            "open_id"=>"ofEOl5H1J8JGB0O2GLQCL1UvFwE0",
            "nickName"=>"王琦",
            "avatarUrl"=>"https://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83eqnWQ2S8iaQdib1icTw8FllE5DYBP71B6ibIX8qSQR245bamjcZx8qkbZxWN91tKwJGQ7o1c2AtsSrFmQ/132",
            "gender"=>1
        ];
        // 可以和当前自己的用户数据库进行比对了
        $model=model("Userwx");
        $res=$model->getUserByOpenID($r["open_id"]);
        if(isset($res)){
            return json([
                "code"=>200,
                "id"=>$res->id
            ]);
        }else{
            $user = $model->saveData($r);
            return json([
               "code"=>200,
               "id"=>$user->id
            ]);
            dump($user);
        }
        // 如果本地数据库有 那么直接返回用户id

        // 如果本地数据库没有 就把用户信息先存到本地数据库 然后再返回用户id

    }
    // 模拟微信支付
    public  function wxPay(){
        // 微信服务器的交互
        return json([
           "msg"=>"支付成功" ,
            "code"=> 200
        ]);
    }

    // 真正微信登录
    public function wxLogins(){
        // 接收用户的code码
        // 微信开放平台
        // 配置appID(来自微信公众平台的信息)  secret_key
        // 向微信服务器发起请求
        // 微信服务器会返回当前用户的信息

        // 如果本地数据库有 那么直接返回用户id

        // 如果本地数据库没有 就把用户信息先存到本地数据库 然后再返回用户id

        $code = input("get.code");
        // 发送请求
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,"https://api.weixin.qq.com/sns/jscode2session?appid=wx24da45b7458cdfaa&secret=c30fc73dac7a0b159e602dbfccd2f980&js_code={$code}&grant_type=authorization_code");

        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        $data = curl_exec($curl);
        curl_close($curl);
        return json([
           "code"=>200,
           "message"=>"获取成功",
            "data"=>$data
        ]);

    }

}