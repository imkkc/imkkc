<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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