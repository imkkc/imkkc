<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index(){

    }


//    public function create(){
//        $user = auth('admin')->user();
//        if ($user->can('create', Role::class)) {
//            // Executes the "create" method on the relevant policy...
//            dd("can create");
//        } else {
//            dd("cant create");
//        }
//    }

    public function create(Request $request)
    {
        $user = auth('admin')->user();
        dd($user->can('create',Role::class));
        $ret = $this->authorize('create', Role::class);
        dd($ret);
        // The current user can create blog posts...
    }

    public function show() {
        $user = auth('admin')->user();
        $role = Role::where('user_id',1)->first();
        if ($user->can('update', $role)) {
            die("tong guo");
        }else{
            die("no no no");
        }
    }

    public function edit($id) {
        $role = Role::findOrFail($id);
        if (Gate::allows('create', $role)) {
            $a = $this->authorize('create', $role);
            dd($a);
        }
echo 'xxxx';exit;
        $ret = $this->authorize('view', $role);

        dd($ret);
    }

    public function store(Request $request){
        $input = $request->toArray();
    }

    public function update($id)
    {
        $role = Role::findOrFail($id);
        dd($role);
        // The current user can update the blog post...
    }

    public function delete(){

    }

}
