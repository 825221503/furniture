<?php

namespace app\api\controller;

use think\Controller;
use think\Request;

class Manager extends Controller
{
    // 初始化
    function _initialize()
    {
        checkToken();
    }
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $query = input('get.');
        $validate = validate('Manager');
        if (!$validate->scene('select')->check($query)){
            return json([
               'msg'=>$validate->getError(),
               'code'=>1001
            ]);
        }
        $model = model('Manager');
        $data = $model->getManager($query['page'],$query['pageSize'],$query['role']);
        $total = $model->getTotal($query['role']);
        if (isset($data,$total)){
            return json([
                'code'=>200,
                'msg'=>'获取成功',
                'data'=>$data,
                'total'=>$total,
            ]);
        }else{
            return json([
                'code'=>404,
                'msg'=>'获取失败'
            ]);
        }
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $body = input('post.');
        $validate = validate('Manager');
        if (!$validate->scene('insert')->check($body)){
            return json([
                'msg'=>$validate->getError(),
                'code'=>1001
            ]);
        }
        $model = model('Manager');
        $r = $model->getDataByUsername($body['username']);
        if (isset($r)){
            return json([
               'msg'=>'已存在该管理员',
               'code'=>1001
            ]);
        }
        $r = $model->insertManager($body);
        if ($r===1){
            return json([
                'msg'=>'添加成功',
                'code'=>200
            ]);
        }else{
            return json([
                'msg'=>'添加失败',
                'code'=>404
            ]);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $model = model('Manager');
        $data = $model->getDataById($id);
        if (isset($data)){
            return json([
               'data'=>$data,
               'msg'=>'查询单个成功',
               'code'=>200,

            ]);
        }else{
            return json([
                'msg'=>'查询单个失败',
                'code'=>404
            ]);
        }
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $body = input('put.');
        $model = model('Manager');
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $model = model('Manager');
        $body = input('put.');
        $r = $model->updateManager($body,$id);
        if (isset($r)){
            return json([
                'data'=>$r,
                'msg'=>'编辑成功',
                'code'=>200
            ]);
        }else{
            return json([
                'msg'=>'编辑失败',
                'code'=>404
            ]);
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $model = model('Manager');
        $r = $model->deleteManager($id);
        if (isset($r)){
            return json([
                'data'=>$r,
                'msg'=>'删除成功',
                'code'=>200
            ]);
        }else{
            return json([
                'msg'=>'删除失败',
                'code'=>404
            ]);
        }
    }
}
