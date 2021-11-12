<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Jurisdiction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
         //获取身份
         $role = Auth::user()->role;
         //拦截
         if($role == 1){
             return  response ()->json ([
                 '你没权限',
                 '204'
             ]);
         }
        //固定返回 让其继续往下执行代码
        return $next($request);
    }
}
