<?php
namespace app\api\model;

use think\Model;

class Admin extends Model{

//    protected $table = 'fruniture_manager';
      protected $name = 'manager';
//      定义一个获取器
      public function getLoginTimeAttr($value)
      {
          return date('Y-m-d H:i:s',$value);
      }
//      根据用户名查询数据
//      @param  string $username
//      @return object
        public function getDataByUsername($username){
            $r = $this->where('username',$username)->find();
            return $r;
        }
        //  根据id查询数据
    public function getDataById($id){
        $r = $this->where('id',$id)->find();
        return $r;
    }
        // 更新最后一次登录时间
        public function updateLoginTime($id){
          $r = $this->save(['login_time'=>time()],['id'=>$id]);
          return $r;
        }
        //  更新密码
        public function updatePassword($newpasswod,$id){
            $r = $this->save(['password'=>$newpasswod],['id'=>$id]);
            return $r;
         }
}