<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Models\Report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TopicResource;
use App\Http\Requests\Api\TopicRequest;
use App\Models\User;
//use Auth;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    //报告控制器
    //发布报告
    public function store(TopicRequest $request)
    {
        $report = Report::create([
                'daily' => $request->daily,
                'weekly' => $request->weekly,
                'monthly' => $request->monthly,
                'report_id' => Auth::user()->id,
            ]
        );
        return new TopicResource($report);
    }
    //修改报告
    public function update(TopicRequest $request)
    {
        $report = Report::where('id',$request->id)->first();
        $report->update(
            $request->all(),

        );
        return [
            'msg' => 'success',
            'data' => $report,
            'code' => 200,
        ];
    }
    //显示自己的报告
    public function show(){
        $id = Auth::user()->id;
        $report = Report::where('report_id',$id)->get();
        //查找数据数量
        $sum = Report::where('report_id',$id)->count();
//        dd($report);
        if ($sum <= 0){
            return [
                'msg' => 'success',
                'data' => '没有这条数据！',
                'code' => 204,
            ];
        }else{
            return [
                'msg' => 'success',
                'data' => $report,
                'code' => 200,
            ];
        }

    }
    //高权限查看
    public function see(Request  $request)
    {
        $report = Report::where('report_id',$request->id)->get();
        $sum = Report::where('report_id',$request->id)->count();
        if ($sum <= 0) {
            return [
                'msg' => 'success',
                'data' => '没有这条数据！',
                'code' => 204,
            ];
        }

        return [
            'msg' => 'success',
            'data' =>   [
                $report
            ],
            'code' => 200,
        ];
    }
    //高权限搜索用户
    public function search(Request $request){
        $user = User::where("name",'like','%'.$request->name.'%')->get();
        //验证
        if(is_null($user)){
            return [
                '不存在此用户',
                204
            ];
        }
        return $user;
    }


}
