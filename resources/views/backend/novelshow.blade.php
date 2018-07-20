@extends('backend.layout')
@section('content')
    <style>
        .mt-20 ul{
            min-height: 550px;
        }
        .mt-20 ul li{
            width:200px;
            float:left;
            text-align: left;
            margin-left: 10px;
        }

    </style>
    <div>
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 小说管理 <span class="c-gray en">&gt;</span> 小说列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="page-container">

            <div class="mt-20">
                <ul>
                    @foreach($chapters as $chapter)
                        <li><a href="javascript:" onclick="chapter_show('{{$chapter['chapter_name']}}','/backend/novel/{{$novel_id}}_{{$chapter['chapter_id']}}/chaptershow')">{{$chapter['chapter_name']}}</a></li>
                    @endforeach
                </ul>


            </div>
        </div>
    </div>

    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="{{asset('/resources/views/backend/lib/jquery/1.9.1/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/resources/views/backend/lib/layer/2.4/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('/resources/views/backend/static/h-ui/js/H-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/resources/views/backend/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{asset('/resources/views/backend/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/resources/views/backend/lib/laypage/1.2/laypage.js')}}"></script>

    <script type="text/javascript">

        function chapter_show(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

    </script>

@endsection
