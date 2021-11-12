<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->name('api.v1.')->group(function() {
    //节流中间件
    Route::middleware('throttle:' . config('api.rate_limits.sign'))
        ->group(function () {
    //注册路由
        Route::post('register', 'Api\UsersController@login')->name('register');
        });
    //未登录可以访问的接口

    //登录路由
    Route::post('login', 'Api\LoginController@login')->name('login');
    //登录之后可以访问的接口
    Route::middleware('auth:api')->group(function () {
        //获取当前用户信息
        Route::post('user/show', 'Api\UsersController@show')->name('user.show');
        //修改当前登录用户的个人信息
        Route::post('user/update', 'Api\UsersController@update')->name('user.update');
        // 登出路由 (登录之后才需要）
        Route::post('logout', 'Api\LoginController@destroy')
            ->name('logout');
        //刷新token
        Route::post('authorizations/current', 'Api\LoginController@update')
            ->name('authorizations.update');
        //发表报告
        Route::post('report/store','Api\TopicsController@store')->name('report.store');
        //修改报告
        Route::post('report/update','Api\TopicsController@update')->name("report.update");
        //查看自己的报告
        Route::post('report/show','Api\TopicsController@show')->name("report.show");
        //高权限中间件
        Route::middleware('role')->group(function () {
            //搜索想要看的用户报告
            Route::post("search",'Api\TopicsController@search');
            //看别人的报告
            Route::post('see','Api\TopicsController@see')->name('see');
            //发布任务
            Route::post('tasks','Api\TaskController@release');
            //查询接收者
            Route::post("tasks/show",'Api\TaskController@show');
            //发布者查看自己发布的任务
            Route::post('tasks/look','Api\TaskController@look');
            //删
            Route::post('task.dele','Api\Publish_taskController@dele');
            //改
            Route::post('task.update','Api\Publish_taskController@update');
        });
        //是否完成任务
        Route::post('task.oppdrag','Api\OppdragController@oppdrag');

    });

});

Route::prefix('v2')->name('api.v2')->group(function (){
    Route::post('role.zen','biao\RoleController@zen');
    Route::post('role.update','biao\RoleController@update');
    Route::post('role.show','biao\RoleController@show');

});
