<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth.admin:admin','menu:admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('后台首页，当前用户名：'.auth('admin')->user()->name);
        //$data['left_menu'] = $this->left_menu;
        $data['tasks'] = [
            [
                'name'     => 'Design New Dashboard',
                'progress' => '87',
                'color'    => 'danger'
            ],
            [
                'name'     => 'Create Home Page',
                'progress' => '76',
                'color'    => 'warning'
            ],
            [
                'name'     => 'Some Other Task',
                'progress' => '32',
                'color'    => 'success'
            ],
            [
                'name'     => 'Start Building Website',
                'progress' => '56',
                'color'    => 'info'
            ],
            [
                'name'     => 'Develop an Awesome Algorithm',
                'progress' => '10',
                'color'    => 'success'
            ]
        ];
        
        return view('admin.home')->with($data);
    }
    

}
