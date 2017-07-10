<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //view()->share('auth_user', $this->authUser);
        //$this->middleware(['auth.admin:admin','menu:admin']);
    }

    public function index(Request $request)
    {
        $pageQuery = $request->toArray();
        $where     = array();
        if (isset($pageQuery['name']) && $pageQuery['name']) {
            $where[] = array('name','like','%'.$pageQuery['name'].'%');
        }
        if (isset($pageQuery['email']) && $pageQuery['email']) {
            $where[] = array('email','like','%'.$pageQuery['email'].'%');
        }
        if (isset($pageQuery['status']) && in_array($pageQuery['status'],[0,1])) {
            $where[] = array('status','=',$pageQuery['status']);
        }
        $pageQuery['perPage'] = $pageQuery['perPage'] ? $pageQuery['perPage'] : 10;
        $model = Admin::where($where)->paginate($pageQuery['perPage']);
        $page = [
            'page_title' => '用户列表',
            'page_description' => '后台管理者中心',
        ];
        $status = Admin::$status;
        $option = Admin::$option;
        return view('admin.admin.list', compact('model', 'page', 'pageQuery','status','option'));
    }

    public function create(){
        $model = new Admin();
        $page = [
            'page_title' => '用户添加',
            'page_description' => '后台管理者中心',
        ];
        return view('admin.admin.form',compact('model','page'));
    }

    public function show($id){
        if (!is_numeric($id)) {
            abort(503);
        }
        $page = [
            'page_title' => '用户修改',
            'page_description' => '后台管理者中心',
        ];
        $model = Admin::find($id);
        return view('admin.admin.form',compact('model','page'));
    }

    public function store(Request $request){
        $input = $request->input();
        dd($input);
        $admin = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ];
        $admin = factory(Admin::class)->create($admin);
        dd($admin);
    }

    public function update(Request $request, $id) {
        $model = Admin::find($id);
        $data = $model->toArray();
        $input = $request->toArray();
        $validator = Validator::make($input,[
            'name'=> 'required|max:1',
            'headline_tags'=> 'required|max:128',
            'target_id'=> 'max:255',
        ]);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
        return $validator->errors()->all();
        abort(403);
    }

/*    public function batAdmin(){
        //批量生产数据的方法，用来制造数据很方便
        $admin = factory(Admin::class,100)->create(['password' => bcrypt(123456)]);
        dd($admin);
    }*/

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
                    Admin::where('id',$id)->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s', time())]);
                }
                return response()->json(['success' => true, 'info' => '处理完毕']);
            } else {
                $id = (int)$param['ids'];
                if (!$id) {
                    return response()->json(['success' => false, 'info' => '数据错误!']);
                }
                $model = Admin::find($id);
                $status = $model->status ? 0 : 1;
                Admin::where('id',$id)->update(['status' => $status, 'updated_at' => date('Y-m-d H:i:s', time())]);
                return response()->json(['success' => true, 'info' => '处理完毕']);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'info' => $e->getMessage()]);
        }
    }

}
