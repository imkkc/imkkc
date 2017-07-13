<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Auth; //Auth::user()->id无效 只能这样访问 auth('admin')->user()->id,
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //通过DB门面的listen方法监听查询事件,这个是记录所有的sql,一般情况应该用不到
//        if (env('SQL_LOG')) {
//            \DB::listen(function ($query) {
//                \Log::info(sprintf("\nsql: %s\nbinds: %s\ntime: %s", $query->sql,
//                    var_export($query->bindings, true), $query->time));
//            });
//        }

        $modelArr = get_file_name(app_path() . "/Models/.");
        foreach ($modelArr as $item) {
            $modelName = "\\App\\Models\\" . $item;
            if (class_exists($modelName)) {
                //model saved 触发
                $tables = array(
                    'admins',
                    'admin_cate',
                );
                $modelName::saved(function ($model) use ($tables) {
                    $tableName = $model->getTable();

                    //记录数据变化
                    $new_content = $model->getAttributes();
                    $old_content = $model->getOriginal();
                    $log         = [
                        'table_name'  => $tableName,
                        'relation_id' => $model->id,
                        'action_type' => !empty($old_content) ? 1 : 0,
                        'old_content' => json_encode($old_content, JSON_UNESCAPED_UNICODE),
                        'new_content' => json_encode($new_content, JSON_UNESCAPED_UNICODE),
                        'op_uid'      => auth('admin')->user()->id,
                        'op_uname'    => auth('admin')->user()->name,
                        'created_at'  => time()
                    ];
                    DB::table('admin_op_log')->insert($log);
                });

                //model deleting 触发
                $modelName::deleting(function ($model) {
                    $tableName = $model->getTable();
                    //记录数据变化
                    $new_content = $model->getAttributes();
                    $old_content = $model->getOriginal();
                    $log         = [
                        'table_name'  => $tableName,
                        'relation_id' => $model->id,
                        'action_type' => 2,
                        'old_content' => json_encode($old_content, JSON_UNESCAPED_UNICODE),
                        'new_content' => json_encode($new_content, JSON_UNESCAPED_UNICODE),
                        'op_uid'      => auth('admin')->user()->id,
                        'op_uname'    => auth('admin')->user()->name,
                        'created_at'  => time()
                    ];
                    DB::table('admin_op_log')->insert($log);
                });
            }
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
