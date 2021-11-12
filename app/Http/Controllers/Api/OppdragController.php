<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use App\Http\Requests\Api\TaskRequest;
use App\Models\Publish_task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OppdragController extends Controller
{
    public function oppdrag(Request $request){
        //获取发布者名字
        $publisher = User::find(Auth::user()->id)->name;
        defaultDecoder($publisher);
    }
}