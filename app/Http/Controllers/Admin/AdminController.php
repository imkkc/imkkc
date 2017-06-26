<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth.admin:admin','menu:admin']);
    }

    public function index(Request $request) {
        $pageQuery = $request->toArray();
        $pageQuery['perPage'] = $request->get('perPage') ? $request->get('perPage') : 10;
        $model = Admin::paginate($pageQuery['perPage']);
        $page_title = '用户列表';
        $page_description = '后台管理者中心';
        return view('admin.admin.list',compact('model','page_title','page_description','pageQuery'));
    }

    public function create(){
        $page_title = '用户列表';
        $page_description = '后台管理者中心';
        return view('admin.admin.form',compact('model','page_title','page_description'));
    }

    public function show($id){
        $model = Admin::find($id);
        return view('admin.admin.form',compact('model'));
    }

    public function store(Request $request){
        $input = $request->input();
        $admin = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ];
        $admin = factory(Admin::class)->create($admin);
        dd($admin);
    }

    public function batAdmin(){
        $admin = factory(Admin::class,100)->create(['password' => bcrypt(123456)]);
        dd($admin);
    }

}
