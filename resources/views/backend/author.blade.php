@extends('backend.layout')
@section('content')

    <div>
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 作者管理 <span class="c-gray en">&gt;</span> 作者列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="page-container">
            <div class="text-c">
                <form action="/backend/author" method="post">
                    {{csrf_field()}}
                <input type="text" class="input-text" style="width:250px" placeholder="输入作者" id="searchword" name="searchword">
                <button type="submit" class="btn btn-success" id="searchbutton" name=""><i class="Hui-iconfont">&#xe665;</i> 搜作者</button>
                </form>
            </div>
            <div class="mt-20">
                <table class="table table-border table-bordered table-bg table-hover table-sort">
                    <thead>
                    <tr class="text-c">
                        <th width="40">ID</th>
                        <th width="60">图片</th>
                        <th width="60">作者</th>
                        <th width="40">作者名拼音</th>
                        <th width="100">介绍</th>
                        <th width="100">关键词</th>
                        <th width="100">描述</th>
                        <th width="30">操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($datas->items() as $data)
                        <tr class="text-c va-m">
                            <td>{{$data->author_id}}</td>
                            <td class="text-l">{{$data->author_cover_path}}</td>
                            <td><a onClick="product_show('{{$data->author}}','product-show.html','10001')" href="javascript:;">{{$data->author}}</a></td>
                            <td class="text-l">{{$data->author_pinyin}}</td>
                            <td class="text-l">{{$data->author_intro}}</td>
                            <td class="text-l">{{$data->author_keyword}}</td>
                            <td class="text-l">{{$data->author_description}}</td>
                            <td class="td-manage">
                                <a style="text-decoration:none" class="ml-5" onClick="product_edit('作者编辑','/backend/author/{{$data->author_id}}/edit')" href="javascript:;" title="编辑">
                                    <i class="Hui-iconfont">&#xe6df;</i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                {{$datas->links()}}


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

        /*产品-编辑*/
        function product_edit(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

        function product_show(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

    </script>

@endsection
