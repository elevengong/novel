@extends('backend.layout')
@section('content')

    <div>
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 小说管理 <span class="c-gray en">&gt;</span> 小说列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="page-container">
            <div class="text-c">
                <form action="/backend/novel" method="post">
                    {{csrf_field()}}
                    <input type="text" class="input-text" style="width:250px" placeholder="输入小说名" id="searchword" name="searchword">
                    <button type="submit" class="btn btn-success" id="searchbutton" name=""><i class="Hui-iconfont">&#xe665;</i> 搜小说名</button>
                </form>
            </div>
            <div class="mt-20">
                <table class="table table-border table-bordered table-bg table-hover table-sort">
                    <thead>
                    <tr class="text-c">
                        <th width="20">ID</th>
                        <th width="40">图片</th>
                        <th width="50">小说名</th>
                        <th width="50">拼音</th>
                        <th width="100">小说介绍</th>
                        <th width="30">小说分类</th>
                        <th width="20">小说作者</th>
                        <th width="100">最新章节</th>
                        <th width="10">状态</th>
                        <th width="10">前台显示</th>
                        <th width="10">操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($datas->items() as $data)
                        <tr class="text-c va-m">
                            <td>{{$data->n_id}}</td>
                            <td class="text-l"><img src="{{$data->novel_cover_path}}" width="50px;"\></td>
                            <td><a onClick="novel_show('{{$data->novel_name}}','/backend/novel/{{$data->n_id}}/show')" href="javascript:;">{{$data->novel_name}}</a></td>
                            <td class="text-l">{{$data->novel_name_pinyin}}</td>
                            <td class="text-l">{{$data->novel_intro}}</td>
                            <td class="text-l">{{$data->c_name}}</td>
                            <td class="text-l">{{$data->author}}</td>
                            <td class="text-l">{{$data->lastchapter}}</td>
                            <td class="text-l">@if($data->finish)完结@else未完结@endif</td>
                            <td class="text-l">@if($data->show)显示@else不显示@endif</td>
                            <td class="td-manage">
                                <a style="text-decoration:none" class="ml-5" onClick="product_edit('作者编辑','/backend/novel/{{$data->n_id}}/edit')" href="javascript:;" title="编辑">
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

        function novel_show(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

    </script>

@endsection
