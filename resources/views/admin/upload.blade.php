<html>
<head>
    <title>文件上传</title>
</head>
<body>
{{--<form method="post" action="{{route('admin.up')}}"--}}
{{--    enctype="multipart/form-data"--}}
{{-->--}}
{{--    @csrf--}}

{{--    <p>--}}
{{--        <input type="file" name="pic" id="">--}}
{{--    </p>--}}
{{--    <p>--}}
{{--        <input type="submit" value="上传图片" >--}}
{{--    </p>--}}
{{--</form>--}}
<div class="panel panel-default">
    <div class="panel-heading">文件上传</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="/upload" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="file" class="col-md-4 control-label">Hello world</label>

                <div class="col-md-6">
                    <input id="file" type="file" class="form-control" name="source">
                </div>
            </div>



            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-sign-in"></i> 上传
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<a href="{{route('download')}}" class="btn btn-large pull-right">
    <i class="btn btn-success">下载按钮 </i>
</a>
</body>
</html>