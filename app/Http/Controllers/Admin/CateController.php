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
    public function index(Request $request)
    {
//        $pageQuery = $request->toArray();
//        $where     = array();
//        if (isset($pageQuery['cate_name']) && $pageQuery['cate_name']) {
//            $where[] = array('cate_name','like','%'.$pageQuery['cate_name'].'%');
//        }
//        if (isset($pageQuery['cate_path']) && $pageQuery['cate_path']) {
//            $where[] = array('cate_path','like','%'.$pageQuery['cate_path'].'%');
//        }
//        if (isset($pageQuery['status']) && in_array($pageQuery['status'],[0,1])) {
//            $where[] = array('status','=',$pageQuery['status']);
//        }
//        $pageQuery['perPage'] = $request->get('perPage') ? $pageQuery['perPage'] : 10;
//        $model = AdminCate::where($where)->paginate($pageQuery['perPage']);
//        $page = pageNav('帐号管理','权限菜单','选中一个节点进行操作');
//        $status = AdminCate::$status;
//        $option = AdminCate::$option;
//        return view('admin.cate.list', compact('model', 'page', 'pageQuery','status','option'));
        $page = pageNav('帐号管理','权限菜单','选中一个节点进行操作');
        $list = AdminCate::all()->toArray();
        $tree = json_encode($list);
        return view('admin.cate.list', compact('page'));
    }

    public function getTree(){
        $list = AdminCate::all()->toArray();
        $tree = getTree($list,0);
        return response()->json(['status' => 200, 'info' => $tree]);
    }

    public function addTree(Request $request){
        $input = $request->input();
//        $validator = Validator::make($input,[
//            'cate_name'=> 'required|max:30|unique:admin_cates',
//            'cate_path' => 'required|max:100|unique:admin_cates',
//            'parent' => 'required',
//        ]);
//        if ($validator->fails()) {
//            return Redirect::back()->withErrors($validator)->withInput();
//        }
        $admin = [
            'text' => $input['text'],
            'link' => $input['link'],
            'parent' => $input['parent'],
        ];
        AdminCate::create($admin);
        return response()->json(['status' => 200, 'info' => '添加成功']);
    }

    public function editTree(Request $request){
        $input = $request->input();
        $model = AdminCate::find($input['id']);

        $model->text = $input['text'];
        $model->link = $input['link'];
        $model->parent = $input['parent'];
        if ($model->save()) {
            return response()->json(['status' => 200, 'info' => '修改成功']);
        }else{
            return response()->json(['status' => 110, 'info' => '修改失败了']);        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminCate  $adminCate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->input();

        $model = AdminCate::find($id);
        if (!$model) {
            return Redirect::back()->with('errorMessage', ' 没有符合的信息 ! ');
        }
        if ($input['cate_name'] == $model->cate_name  &&  $input['cate_path'] == $model->cate_path)
        {
            return Redirect::back()->with('message', ' 没有任何信息变化 ! ');
        }
        $match = [
            'cate_name'=> 'required|max:30',
            'cate_path' => 'required|max:100',
        ];
        if ($model->cate_name != $input['cate_name']) {
            $match['cate_name'] .= '|unique:admin_cates';
        }
        if ($model->cate_path != $input['cate_path']) {
            $match['cate_path'] .= '|unique:admin_cates';
        }
        $validator = Validator::make($input,$match);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $model->cate_name = $input['cate_name'];
        $model->cate_path = $input['cate_path'];
        $model->parent    = $input['parent'];
        if ($model->save()) {
            return Redirect::back()->with('message', ' 修改成功 ! '. date('y-m-d H:i:s',time()));
        }else{
            return Redirect::back()->with('errorMessage', ' 修改失败了 ! ');
        }
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

    function changeStatus(Request $request)
    {
        $param = $request->toArray();
        try {
            if (isset($param['opt'])) {
                $status = ($param['opt'] == 'open') ? 1 : 0;
                $idArr  = explode(',', $param['ids']);
                if (!is_array($idArr)) {
                    return response()->json(['success' => false, 'info' => '数据错误!']);
                }
                foreach ($idArr as $id) {
                    AdminCate::where('id',$id)->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s', time())]);
                }
                return response()->json(['success' => true, 'info' => '处理完毕']);
            } else {
                $id = (int)$param['ids'];
                if (!$id) {
                    return response()->json(['success' => false, 'info' => '数据错误!']);
                }
                $model = AdminCate::find($id);
                $status = $model->status ? 0 : 1;
                AdminCate::where('id',$id)->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s', time())]);
                return response()->json(['success' => true, 'info' => '处理完毕']);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'info' => $e->getMessage()]);
        }
    }

}
