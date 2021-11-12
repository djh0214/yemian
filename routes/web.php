<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.upload');
});
//上传文件
Route::post('upload','Api\FileController@upload');
//下载文件
//Route::post("down",'Api\FileController@down');
//Route::get('download',function(){
//    return response()->download(realpath(base_path('public')).'/tourist.xlsx', 'tourist.xlsx');
//});
Route::get('/download','Api\FileController@download')->name('download');













