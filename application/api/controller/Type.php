<?php

namespace app\api\controller;

use think\Controller;
use think\Request;

class Type extends Controller
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
        $model = model('Type');
        $query = input('get.');
        $r = $model->getAllType($query);
        if (isset($r)){
            return json([
                'data'=>$r,
                'msg'=>'查询成功',
                'code'=>200
            ]);
        }else{
            return json([
                'msg'=>'查询失败',
                'code'=>404
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
        $validate = validate('Type');
        if (!$validate->scene('insert')->check($body)){
            return json([
               'msg'=>$validate->getError(),
               'code'=>1001
            ]);
        }
        $model = model('Type');
        $r = $model->getDateByName($body['typename']);
        if (isset($r)){
            return json([
                'msg'=>'已存在该分类',
                'code'=>1001
            ]);
        }
        $r = $model->insertType($body);
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
        $model = model('Type');
        $data = $model->getById($id);
        if (isset($data)){
            return json([
               'data'=>$data,
               'msg'=>'获取单个成功',
               'code'=>200
            ]);
        }else{
            return json([
                'msg'=>'获取单个失败',
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
        //
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
        $body = input('put.');
        $model = model('Type');
        $r = $model->updateType($body,$id);
        if (isset($r)){
            return json([
               'msg'=>'更新编辑成功',
               'code'=>200
            ]);
        }else{
            return json([
                'msg'=>'更新编辑失败',
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
        $model = model('Type');
        $r = $model->getAllType(['pid'=>$id]);
        if (!empty($r)){
            return json([
               'msg'=>'当前分类下还有其他分类，不能删除',
               'code'=>1002  // 代表操作不对
            ]);
        }
        $r = $model->deleteType($id);
        if ($r===1){
            return json([
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
