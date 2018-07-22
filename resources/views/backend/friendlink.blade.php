@extends('backend.layout')
@section('content')

    <div>
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 分类管理 <span class="c-gray en">&gt;</span> 分类列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="page-container">
            <div class="cl pd-5 bg-1 bk-gray mt-20"><a class="btn btn-primary radius" onClick="link_add('添加友情链接','/backend/system/friendlinkadd')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加友情链接</a></span>  </div>
            <div class="mt-20">
                <table class="table table-border table-bordered table-bg table-hover table-sort">
                    <thead>
                    <tr class="text-c">
                        <th width="40">ID</th>
                        <th width="60">网站名</th>
                        <th width="100">网址</th>
                        <th width="50">显示</th>
                        <th width="50">排序</th>
                        <th width="50">操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($friendlinks as $friendlink)
                        <tr class="text-c va-m">
                            <td>{{$friendlink['id']}}</td>
                            <td>{{$friendlink['webname']}}</td>
                            <td class="text-l">{{$friendlink['web']}}</td>
                            <td class="td-status">@if($friendlink['status']==1) 显示 @else 不显示 @endif</td>
                            <td>{{$friendlink['priority']}}</td>
                            <td class="td-manage">
                                <a style="text-decoration:none" class="ml-5" onClick="link_edit('分类编辑','/backend/system/friendlinkedit/{{$friendlink['id']}}')" href="javascript:;" title="编辑">
                                    <i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="link_del(this,'{{$friendlink['id']}}')" href="javascript:;" title="删除">
                                    <i class="Hui-iconfont">&#xe6e2;</i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
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


    <script type="text/javascript" src="{{asset('/resources/views/backend/js/friendlink.js')}}"></script>
    <script type="text/javascript">
        function link_add(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

        function link_edit(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

        function link_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                $.ajax({
                    type: 'delete',
                    url: '/backend/system/friendlinkdel/'+ id,
                    dataType: 'json',
                    headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                    success: function(data){
                        if(data.status == 1)
                        {
                            layer.msg(data.msg);
                            window.location.reload();
                        }else{
                            layer.msg(data.msg);
                        }
                    },
                    error:function(data) {
                        layer.msg('删除失败',{icon:1,time:1000});
                    },
                });
            });
        }
    </script>

@endsection
