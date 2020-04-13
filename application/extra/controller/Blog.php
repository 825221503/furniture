<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use app\api\model\Blog as Blogs;

class Blog extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
//        return '显示资源列表';
//        $list = Blogs::all();
//        return json($list);
        $model = model('Blog');
        $data = $model->getList();
        return json([
            'data'=>$data,
            'code'=>200,
            'msg'=>'获取成功'
            ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
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
        $validate = validate('Blog');
        if (!$validate->scene('insert')->check($body)){
            dump($validate->getError());
        }
//        $data = $request->param();
//        $result = Blogs::create($data);
//        return json($result);
        $model = model('Blog');
        $r = $model->saveData($body);
        dump($r);
        return 'save';
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
//        $data = Blogs::get($id);
//        return json($data);
        $model = model('Blog');
        $r = $model->getOne($id);
        if (isiset($r)){
            return json([
               'data'=>$r,
               'msg'=>'ok',
               'code'=>200
            ]);
        }else{
            return json([
                'msg'=>'error',
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
        //
//        return '保存更新的资源';
        $body = input('post.');
        $validate = validate('Blog');
        if (!$validate->scene('update')->check($body)){
            dump($validate->getError());
        }
//        $data = $request->param();
//        $result = Blogs::update($data,['id'=>$id]);
//        return json($result);
        $model = model('Blog');
        $body = input('put.');
        $r = $model->updateData($body,$id);
        return 'updata';
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
//        return '删除指定资源';
//        $result = Blogs::destroy($id);
//        return json($result);
        $model = model('Blog');
        $r = $model->deleteData($id);
        return dump($r);
    }
}
