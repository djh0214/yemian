<?php

namespace App\Http\Controllers\Api;

//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthorizationRequest;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\Api\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\GrenxinxiRequest;

class UsersController extends Controller
{
    //注册方法
    public function login(UserRequest $request)
    {
        //创建用户
            $data = User::create([
                'account_number' => $request->account_number,
                'password' => bcrypt($request->password),
                'role'=> $request->role,
            ]);
//        $data = User::create([
//            'account_number' => $request->account_number,
//            'password' => bcrypt($request->password),
//            'role'=> $request->role,
//
        return [
            'msg' => 'success',
            'data' => $data,
            'code' => 200,
        ];
    }
    //获取用户数据
    public function show(Request $request)
    {
        //数据获取
        $user = User::find(Auth::user()->id);
//        $data = User::where('id',$request->id)->first();
        //判断是否为空
        if (is_null($user)) {
            return ['数据为空', 204] ;
        } else {
            return [$user,'数据获取成功', 200];
        }
    }
    //修改个人信息
    public function update(GrenxinxiRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->update(
            [
                'name'=>$request->name,
                'age'=>$request->age,
                'phone'=>$request->phone,
                'password'=>bcrypt($request->password)
            ]
        );
        return [
            'data' => $user,
            'code' => 200,
        ];
    }
}
