<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\TaskRequest;
use App\Models\Publish_task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Publish_taskController extends Controller
{
    //发布任务
    public function publish(TaskRequest $request)
    {
        //获取发布者名字
        $publisher = User::find(Auth::user()->id)->name;
        //获得接受者名字
        $recipient = User::where("name", $request->name)->first();

        if (is_null($recipient)) {
            return [
                '用户不存在',
                'code' => 110,
            ];
        }
        //获得接收者的id
        $rec_id = $recipient->id;
        //发布任务
        $pub = Publish_task::create([
            'publish_task' => $request->publish_task,
            'publisher' => $publisher,
            'rec_id' => $rec_id
        ]);
        return [
            'msg' => '成功',
            'data' => [
                '发布者' => $publisher,
                '任务' => $request->publish_task

            ],
            'code' => 200,
        ];
    }

    //查方法
    public function show(Request $request)
    {
        //模糊搜索
        $recipient = User::where("name", 'like', '%' . $request->name . '%')->get();
        //验证
        if (is_null($recipient)) {
            return [
                '不存在此用户',
                204
            ];
        }
        return $recipient;
    }

    //改方法
    public function update(Request $request)
    {
////        //获取用户表中的id
//        $id = Auth::user()->id;
////        //要改的用户中id的数据
        $publisher = Publish_task::where('id',$request->id)->first();
////        //指定某一条数据更改

        $publisher->update([
//            'name' => $request->name,
            'publish_task'=> $request->publish_task,
        ]);

        return [
            'data' => $publisher ,
            'code' => 200,
        ];
    }
    //删除方法
    public function dele(Request $request)
    {
//        $recipient = User::where("name", 'like', '%' . $request->name . '%')->get();

        //要删除的用户中的id
        $publish_task = Publish_task::where('id',$request->id);
        if ($publish_task->delete()){
            echo "删除成功";
        }else{
            echo "删除失败";
            echo "\t用户不存在";
            }
    }

}
