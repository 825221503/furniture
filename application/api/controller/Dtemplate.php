<?php

namespace app\api\controller;

use think\Controller;
use think\Request;

class Dtemplate extends Controller
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
//        $validate = validate('Dtemplate');
//        if (!$validate->scene('select')->check($query)){
//            return json([
//               'msg'=>$validate->getError(),
//               'code'=>1001
//            ]);
//        }
        $model = model('Dtemplate');
//        $data = $model->getTemplate($query['page'],$query['pageSize']);
        $data = $model->getTemplate($query);
        $total = $model->getTotal($query);
        if (isset($data,$total)){
            return json([
                'data'=>$data,
                'total'=>$total,
                'code'=>200,
                'msg'=>'获取成功'
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
        $validate = validate('Dtemplate');
        if (!$validate->scene('insert')->check($body)){
            return json([
                'msg'=>$validate->getError(),
                'code'=>1001
            ]);
        }
        $model = model('Dtemplate');
        $r = $model->getTemplateName($body["name"]);
        if (isset($r)){
            return json([
                "msg"=>"已存在同名模板"
            ]);
        }
        $r = $model->insertTemplate($body);
        if ($r===1){
            return json([
                'msg'=>'插入成功',
                'code'=>200
            ]);
        }else{
            return json([
                'msg'=>'插入失败',
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
        $model = model("Dtemplate");
        $data = $model->getOneTemplate($id);
        if (isset($data)){
            return json([
                "data" =>$data,
                'msg'=>"查询单条成功",
                "code"=>200
            ]);
        }else{
            return json([
                'msg'=>"查询单条失败",
                "code"=>404
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
        $model  = model('Dtemplate');
        $r = $model->updateTemplate($body,$id);
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
        $model = model('Dtemplate');
//        $r = $model->getAllTemplate(['did'=>$id]);
//        if (!empty($r)){
//            return json([
//                'msg'=>'当前分类下还有其他分类，不能删除',
//                'code'=>1002  // 代表操作不对
//            ]);
//        }
        $r = $model->deleteTemplate($id);
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
