<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\TaskRequest;
use App\Models\Publish_task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //发布任务
    public function release(TaskRequest $request){
        //获取发布者名字
        $publisher = User::find(Auth::user()->id)->id;
//        //搜索接收者
//        $recipient = User::where("name",'like','%'.$request->name.'%')->get();
//        //检查是否有接收者
//        if(is_null($recipient)){
//            return [
//                '不存在此用户',
//                204
//            ];
//        }
        $rec_id = $request->id;
        //发布任务
        $pub = Publish_task::create([
            'publish_task'=>$request->publish_task,
            'publisher'=>$publisher,
            'rec_id'=>$rec_id
        ]);
        return  [
            'msg' => '成功',
            'data' => [
                '发布者'=>$publisher,
                '任务'=>$request->publish_task

            ],
            'code' => 200,
        ];
    }
    //查询接收者
    public function show(Request $request)
    {
        //模糊搜索
        $recipient = User::where("name",'like','%'.$request->name.'%')->get();
        //验证
        if($recipient){
            return [
                '不存在此用户',
                204
            ];
        }
        return $recipient;
    }
    //发布者看自己发布的任务信息
    public function look(){
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        $publisher = Publish_task::where('publisher',$id)->get();
        if($publisher){
            return [
                204,
                '你还没有发布任务'
            ];
        }
        return [
            200,
            '发布者'=>$name,
            $publisher
        ];
    }

}
