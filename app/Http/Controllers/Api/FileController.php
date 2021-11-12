<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    //

    public function upfile(Request $request){
        //验证文件是否上传
        $bool = $request->hasFile('pic');
        if(!$bool){
            return '没有上传任何图片';
        }
        //有图片上传
        $file = $request->file('pic');
        //得到上传图片的扩展名
        $ext = $file->getClientOriginalExtension();
        //生成一个新的文件
        $filename = time().'.'.$ext;
        //告诉上传放在服务器中的位置
        $upDir = pubilc_path('uploads');
        //实现上传
        $ret = $file->move($upDir,$filename);

        return $ret ? "<img src='/uploads/{filename}'/> " :'null';
    }
    public function upload(Request $request)
    {

        if ($request->isMethod('POST')){
            $file = $request->file('source');
            //判断文件是否上传成功
            if ($file->isValid()){
                //原文件名
                $originalName = $file->getClientOriginalName();
                //扩展名
                $ext = $file->getClientOriginalExtension();
                //MimeType
                $type = $file->getClientMimeType();
                //临时绝对路径
                $realPath = $file->getRealPath();
                $filename = uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
                //判断是否上传成功
                if($bool){
                    echo 'success';
                }else{
                    echo 'fail';
                }
            }
        }
        return view('admin.upload');
    }
    public function download(User $user)
    {
        return Storage::download(Auth::user()->download);
    }

}
