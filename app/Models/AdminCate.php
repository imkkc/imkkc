<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminCate extends Model
{
    protected $table = 'admin_cates';

    /**
     * The attributes that are mass assignable.
     * 可以被批量赋值的属性。
     * @var array
     */
//    protected $fillable = [
//        'cate_name', 'cate_path',
//    ];

    /**
     * 不可被批量赋值的属性。
     * @var array
     */
    protected $guarded = [];

    public static $status = [
        'color' => [
            0 => 'red',
            1 => 'green'
        ],
        'isOpen' => [
            0 => '已关闭',
            1 => '已开启'
        ],
    ];

    public static $option = [
        'icons' => [
            1 => 'fa-pause',
            0 => 'fa-play'
        ],
        'color'=>[
            1 => 'red',
            0 => 'green'
        ],
        'status' => [
            1 => '关闭',
            0 => '开启'
        ]
    ];
}
