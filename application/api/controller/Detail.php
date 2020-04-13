<?php

namespace app\api\controller;

use think\Controller;
use think\Request;

class Detail extends Controller
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
        $model = model('Detail');
        $query = input("get.");

        $r = $model->getDetail($query);
        if (isset($r)){
            return json([
               'data'=>$r,
               'msg'=>'获取成功',
               'code'=>200
            ]);
        }else{
            return json([
                'msg'=>'获取失败',
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
        $validate = validate('Detail');
        if (!$validate->scene('insert')->check($body)){
            return json([
                'msg'=>$validate->getError(),
                'code'=>1001
            ]);
        }
        $model =model('Detail');
        $data = $model->insertDetail($body);
        if ($data===1){
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
        $model = model('Detail');
        $data = $model->getOneDetail($id);
        if (isset($data)){
            return json([
                'data'=>$data,
                'msg'=>'获取单条成功',
                'code'=>200
            ]);
        }else{
            return json([
                'msg'=>'获取单条失败',
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
        $model = model('Detail');
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
        $model = model('Detail');
        $r = $model->deleteDetail($id);
        if (isset($r)){
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
