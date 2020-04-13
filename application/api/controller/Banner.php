<?php

namespace app\api\controller;

use think\Controller;
use think\JWT;
use think\Request;

class Banner extends Controller
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
        //
        $query = input('get.');
        $validate = validate('Banner');
        if (!$validate->scene('select')->check($query)){
            return json([
                'msg'=>$validate->getError(),
                'code'=>10001
            ]);
        }
        $model = model('Banner');
//      $datas = $model->getBanner();
        $data = $model->getDataList($query['page'],$query['pageSize']);
        $total = $model->getTotal();
        if (isset($data,$total)){
            return json([
//                'datas'=>$datas,
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

        return '显示创建资源表单页';
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
        $validate = validate('Banner');
        if (!$validate->scene('insert')->check($body)){
            return json([
                'msg'=>$validate->getError(),
                'code'=>10001
            ]);
        }
//        $data = $request->param();
//        $result = Banner::create($data);
//        return json($result);
        $model = model('Banner');
        $r = $model->saveBanner($body);
        if ($r===1){
            return json([
//              'data'=>$r,
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
        //
        $model = model('Banner');
        $r = $model->getOneBanner($id);
        if (isset($r)){
            return json([
                'data'=>$r,
                'msg'=>'获取指定成功',
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
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
        return '显示编辑资源表单页';
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
        // 上边是验证validate
//        $body = input('put.');
//        $validate = validate('Banner');
//        if (!$validate->scene('update')->check($body)){
//            return json([
//                'msg'=>$validate->getError(),
//                'code'=>10001
//            ]);
//        }
//        $data = $request->param();
//        $result = Blogs::update($data,['id'=>$id]);
//        return json($result);
        $model = model('Banner');
        $body = input('put.');
        $r = $model->updateBanner($body,$id);
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
        $model = model('Banner');
        $r = $model->deleteBanner($id);
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
