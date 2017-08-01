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
        $pageQuery['perPage'] = $request->get('perPage') ? $pageQuery['perPage'] : 10;
        $model = Admin::where($where)->paginate($pageQuery['perPage']);
        $page = pageNav('帐号管理','用户列表');
        $status = Admin::$status;
        $option = Admin::$option;
        return view('admin.admin.list', compact('model', 'page', 'pageQuery','status','option'));
    }

    public function create(){
        $model = new Admin();
        $page = pageNav('帐号管理','添加用户');
        return view('admin.admin.form',compact('model','page'));
    }

    public function show($id){
        if (!is_numeric($id)) {
            abort(503);
        }
        $page = pageNav('帐号管理','用户修改');
        $model = Admin::find($id);
        return view('admin.admin.form',compact('model','page'));
    }

    public function store(Request $request){
        $input = $request->input();
        $validator = Validator::make($input,[
            'name'=> 'required|max:30',
            'email' => 'required|email|max:100|unique:admins',
            'password' => 'required|max:18',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $admin = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ];
        Admin::create($admin);
        //return Redirect::route('admin.index');
        return Redirect::back()->with('message', ' 添加成功 ! ');
    }

    public function update(Request $request, $id) {
        $input = $request->input();
        $validator = Validator::make($input,[
            'name'=> 'required|max:30',
            //'email' => 'required|email|max:100|unique:admins',
            'password' => 'max:18',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $model = Admin::find($id);
        if (!$model) {
            return Redirect::back()->with('errorMessage', ' 没有符合的信息 ! ');
        }
        $model->name = $input['name'];
        $model->email = $input['email'];
        if ($input['password']) {
            $model->password = $input['password'];
        }
        if ($model->save()) {
            return Redirect::back()->with('message', ' 修改成功 ! '. date('y-m-d H:i:s',time()));
        }else{
            return Redirect::back()->with('errorMessage', ' 修改失败了 ! ');
        }
        //abort(403);
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

    function icons(){
        $page = pageNav('Icons列表','Icons筛选','a set of beautiful icons');
        return view('admin.ui.icons',compact('page'));
    }

}
