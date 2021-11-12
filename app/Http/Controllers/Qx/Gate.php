<?php

namespace App\Http\Controllers\Qx;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class Gates extends Controller
{
    /**
     * 在这里进行定义，触发规则将包括：包含了任何需要身份验证、授权服务的行为。
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('update-post', function (User $user, Role $role) {
//            return $user->role === $role->id;
//        });

//        //是否有权执行某个行为
//        if (Gate::forUser($user)->allows('unpdate-post',$role)){
//            //这个用户可以提交upadate...
//        }
//        if (Gate::forUser($user)->denies('update-post', $role)) {
//            // 这个用户不可以提交update...
//        }
//        if (Gate::any('update-post','delete-post',$post)){
//            // 用户可以提交update和delete..
//        }
//        if (Gate::none(['update-post', 'delete-post'], $post)) {
//            // 用户不可以提交update和delete...
//        }
//        Gate::authorize('update-post', $post);

// 行为已获授权...
//    }
}