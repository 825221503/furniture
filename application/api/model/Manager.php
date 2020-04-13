<?php
/**
 * Created by PhpStorm.
 * User: 柏林
 * Date: 20/2/13
 * Time: 11:09
 */
namespace app\api\model;

use think\Model;
use traits\model\SoftDelete;
class Manager extends Model{

    protected $name='manager';
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    public function getLoginTimeAttr($value){
        return date("Y-m-d H:i:s",$value);
    }
    // 获取管理员列表
    public function getManager($page,$pageSize,$role){
        $start = ($page-1)*$pageSize;
        $data = $this->field('id,username,role,status,create_time,login_time')->where('role',$role)->limit($start,$pageSize)->select();
        return $data;
    }
    // 获取管理员数量
    public function getTotal($role){
        return $this->where('role',$role)->count();
    }
    // 新增管理员
    public function insertManager($body){
        $body['hash'] = $this->createHash();
        $body['password'] = $this->createPassword('123456',$body['hash']);
        $body['login_time'] = 0;
        $body['role'] = 2;
        $this->data($body);
        $r = $this->allowField(true)->save();
        return $r;
    }
    // 创建hash的方法
    private function createHash(){
        return md5(time());
        // 1b452ccc82fca7018b19704fa0d0c37b
    }
    // 创建密码的方法
    private function createPassword($password,$salt){
        // 加盐加密 为了避免用户的密码泄密
        return md5($password.$salt);
        // a1086f50a25f1e9560e6845a2fb1ab47
    }
    // 用来根据用户名获取数据的方法
    public function getDataByUsername($username){
        $r = $this->where('username',$username)->find();
        return $r;
    }
    // 根据id获取数据
    public function getDataById($id){
        $r = $this->where('id',$id)->field('id,username,role,status,create_time,login_time')->find();
        return $r;
    }
    //  更新编辑的操作
    public function updateManager($data,$id){
        if (isset($data['password'])){
            $r = $this->where('id',$id)->find();
            if (!isset($r)){
                return $r;
            }
            $password = $this->createPassword($data['password'],$r->hash);
            $data['password'] = $password;
        }
        $r = $this->allowField(true)->save($data,['id'=>$id]);
        return $r;
    }
    // 删除数据
    public function deleteManager($id){
        $data = $this->where('id',$id)->find();
        if(!isset($data)){
            return 0;
        }
        $r = $data->delete();
        return $r;
    }
}