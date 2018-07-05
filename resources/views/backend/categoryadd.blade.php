@extends('backend.layout')
@section('content')
	<div class="page-container">
		<form action="/backend/category" method="post" class="form form-horizontal" id="form-user-add">
			{{csrf_field()}}
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">
					<span class="c-red">*</span>
					分类名称：</label>
				<div class="formControls col-xs-6 col-sm-6">
					<input type="text" class="input-text" value="" placeholder="" name="name">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">
					<span class="c-red">*</span>
					状态：</label>
				<div class="formControls col-xs-6 col-sm-6">
					<select name="show">
						<option value="1" selected="selected">显示</option>
						<option value="0">不显示</option>
					</select>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">
					<span class="c-red">*</span>
					排序(数字)：</label>
				<div class="formControls col-xs-6 col-sm-6">
					<input type="text" class="input-text" value="0" placeholder="" name="priority" width="50">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">
					关键词：</label>
				<div class="formControls col-xs-6 col-sm-6">
					<input type="text" class="input-text" value="" placeholder="" name="keyword">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">描述：</label>
				<div class="formControls col-xs-6 col-sm-6">
					<textarea name="description" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符"></textarea>
				</div>
			</div>
			<div class="row cl">
				<div class="col-9 col-offset-2">
					<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				</div>
			</div>
		</form>
	</div>
	<!--_footer 作为公共模版分离出去-->
	<script type="text/javascript" src="{{asset('/resources/views/backend/lib/jquery/1.9.1/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/resources/views/backend/lib/layer/2.4/layer.js')}}"></script>
	<script type="text/javascript" src="{{asset('/resources/views/backend/static/h-ui/js/H-ui.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/resources/views/backend/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->
	<script type="text/javascript" src="{{asset('/resources/views/backend/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/resources/views/backend/lib/laypage/1.2/laypage.js')}}"></script>

	@if(isset($data))

		@if($data['status'] == 1)
			<script>
                $(function(){
                    layer.msg("{{$data['msg']}}", {
                        icon: 1,
                        time: 1000,
                        end: function () {
                            var index = parent.layer.getFrameIndex(window.name);
                            window.parent.location.reload()
                            parent.layer.close(index);
                        }
                    });
                })
			</script>
		@endif

		@if($data['status'] == 0)
			<script>
                $(function(){
                    layer.msg('{{$data['msg']}}',{icon:1,time:2000});
                })
			</script>
		@endif

	@endif

@endsection