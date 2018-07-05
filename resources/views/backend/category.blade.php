@extends('backend.layout')
@section('content')

	<div>
		<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 分类管理 <span class="c-gray en">&gt;</span> 分类列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
		<div class="page-container">
			<div class="cl pd-5 bg-1 bk-gray mt-20"><a class="btn btn-primary radius" onClick="product_add('添加分类','/backend/category/create')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a></span>  </div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-bg table-hover table-sort">
					<thead>
					<tr class="text-c">
						<th width="40">ID</th>
						<th width="60">分类名</th>
						<th width="100">分类名拼音</th>
						<th width="100">关键词</th>
						<th>描述</th>
						<th width="100">排序</th>
						<th width="60">状态</th>
						<th width="100">操作</th>
					</tr>
					</thead>
					<tbody>

					@foreach($categorys as $category)
					<tr class="text-c va-m">
						<td>{{$category['c_id']}}</td>
						<td><a onClick="product_show('{{$category['c_name']}}','product-show.html','10001')" href="javascript:;">{{$category['c_name']}}</a></td>
						<td class="text-l">{{$category['c_name_pinyin']}}</td>
						<td class="text-l">{{$category['c_keyword']}}</td>
						<td class="text-l">{{$category['c_description']}}</td>
						<td>{{$category['priority']}}</td>
						<td class="td-status">@if($category['show']==1) 显示 @else 不显示 @endif</td>
						<td class="td-manage">
							<a style="text-decoration:none" class="ml-5" onClick="product_edit('分类编辑','/backend/category/{{$category['c_id']}}/edit')" href="javascript:;" title="编辑">
								<i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="product_del(this,'{{$category['c_id']}}')" href="javascript:;" title="删除">
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

	<script type="text/javascript">
		/*产品-添加*/
        function product_add(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
		/*产品-查看*/
        function product_show(title,url,id){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

		/*产品-编辑*/
        function product_edit(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

		/*产品-删除*/
        function product_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                $.ajax({
                    type: 'delete',
                    url: '/backend/category/'+ id,
                    dataType: 'json',
                    headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                    success: function(data){
                        $(obj).parents("tr").remove();
                        layer.msg(data.msg,{icon:1,time:1000});
                    },
                    error:function(data) {
                        layer.msg('删除失败',{icon:1,time:1000});
                    },
                });
            });
        }
	</script>
	@if(!empty(session('msg')))
		<script>
            $(function(){
                layer.msg('{{session('msg')}}',{icon:1,time:2000});
            });
		</script>
	@endif
@endsection
