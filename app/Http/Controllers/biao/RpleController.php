<?php

namespace App\Http\Controllers\biao;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class RoleController extends Controller
{
//添加
    public function zen(Request $request)
    {
//        dd(Role::get());
//        $date = Role::where('role_id',$request->role_id)->with('users')->first();
        $data = Role::create([
            'name' => $request->name,
            'role_id' => $request->role_id,
        ]);
        return [
            'msg' => 'success',
            'data' => $data,
            'code' => 200,
            ];
    }
    //查

    public function show(Request $request){
        {
//            $request->role_id ?
//                $data = Role::where('id',$request->role_id)->first() :
//                $data = Role::where('name',$request->name)->first();
            //获取用户信息
            $data = Role::with('Role')->where('id',$request->role_id)->get();
//            $data = Role::where('name',$request->name)->first();
//          $data = User::where('id',$request->id)->first();
            //判断是否为空
//            dd(empty($data));
            if (empty($data)) {
                return response()->json(['message' => '数据为空', 'code' => '0']);
            } else {
                return response()->json(['message' => '数据获取成功', 'code' => '1','data' => $data]);
            }
        }
    }

//修改
    public function update(Request $request)
    {
        $role_name= $request['name'];
        $role = Role::where('name',$role_name)->first();

        $role->update([
            'name' => $request->name,
            'role_id'=> $request->role_id,
        ]);
        return [
            'data' => $role,
            'code' => 200,
        ];
    }
}