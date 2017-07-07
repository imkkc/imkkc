<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
        $model = Admin::where($where)->paginate($pageQuery['perPage']);
        $pageQuery['perPage'] = $request->get('perPage') ? $request->get('perPage') : 10;
        $page_title           = '用户列表';
        $page_description     = '后台管理者中心';
        return view('admin.admin.list', compact('model', 'page_title', 'page_description', 'pageQuery'));
    }

    public function create(){
        $model = new Admin();
        $page_title = '用户添加';
        $page_description = '后台管理者中心';
        return view('admin.admin.form',compact('model','page_title','page_description'));
    }

    public function show($id){
        if (!is_numeric($id)) {
            abort(503);
        }
        $model = Admin::find($id);
        return view('admin.admin.form',compact('model'));
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

    public function batAdmin(){
        $admin = factory(Admin::class,100)->create(['password' => bcrypt(123456)]);
        dd($admin);
    }

}
