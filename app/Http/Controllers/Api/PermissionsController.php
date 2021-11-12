<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
class PermissionsController extends Controller
{
    //获取授权页面
    public function auth($id)
    {
        //获取当前角色
        $role = Role::find($id);
        //获取所有的权限列表
        $perms = Permission::get();
        //获取当前角色拥有的权限
        $own_perms = $role->permission;
        foreach ($own_perms as $v){
            $own_perms[]=$v->id;
        }
        return[
            $role,
            $perms,
            $own_perms
        ];
    }
}
