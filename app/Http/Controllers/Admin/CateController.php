<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use function MongoDB\BSON\toJSON;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = pageNav('帐号管理','权限菜单','选中一个节点进行操作');
        return view('admin.cate.list', compact('page'));
    }

    public function getTree(){
        $list = AdminCate::all()->toArray();
        $tree = getTree($list,0);
        return response()->json(['status' => 200, 'info' => $tree]);
    }

    public function addTree(Request $request){
        $input = $request->input();
        if (!$input['text']){
            return response()->json(['status' => 403, 'message' => '请填写一个权限名称']);
        }
        $admin = [
            'text' => $input['text'],
            'link' => $input['link'],
            'parent' => $input['parent'] ? (int)$input['parent'] : 0,
            'icon' => $input['icon'] ? $input['icon'] : 'fa-circle-o',
        ];
        $cate = AdminCate::where($admin)->first();
        if ($cate) {
            return response()->json(['status' => 403, 'message' => '该权限菜单已经存在，不能重复添加']);
        }
        AdminCate::create($admin);
        return response()->json(['status' => 200, 'message' => '添加成功']);
    }

    public function editTree(Request $request){
        $input = $request->input();
        $model = AdminCate::find($input['id']);

        $model->text = $input['text'];
        $model->link = $input['link'];
        $model->parent = (int)$input['parent'];
        $model->icon = (int)$input['icon'];
        if ($model->save()) {
            return response()->json(['status' => 200, 'message' => '修改成功']);
        }else{
            return response()->json(['status' => 110, 'message' => '修改失败了']);        }
    }


    public function delTree(Request $request)
    {
        $input = $request->input();
        $id = ($input['id'] == 'open') ? 1 : 0;
        $status = ($input['opt'] == 'open') ? 1 : 0;
        $ret = AdminCate::where('id',$id)->update(
            ['status' => $status, 'updated_at' => date('Y-m-d H:i:s', time())]
        );
        if ($ret)
            return response()->json(['status' => 200, 'message' => '处理完毕']);
        else
            return response()->json(['status' => 201, 'message' => '处理失败']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminCate  $adminCate
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminCate $adminCate)
    {
        abort(503);
    }


}
