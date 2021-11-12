<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthorizationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        //登录方法
    public function login(AuthorizationRequest $request){
//      dd($request->all());
        //核对账号和密码
        $credentials['account_number'] = $request->account_number;


        $credentials['password'] = $request->password;
//dd($credentials);
        //判断 返回token
        if(!$token = \Auth::guard('api')->attempt($credentials)){
            return response()->json([
                'msg' => '密码或者账号错误'
            ])->setStatusCode(401);
        }
        return $this->respondWithToken($token);
//        return response()->json([
//            'access_token' => $token,
//            'token_type' => 'Bearer',
//            'expires_in' => \Auth::guard('api')->factory()->getTTl() * 60
//        ])->setStatusCode(201);
    }
    //刷新token
    public function update()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }
    //登出
    public function destroy()
    {
        auth('api')->logout();
        return response()->json([
            'message'=>'登出成功！'
        ]);
    }
    //token
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}