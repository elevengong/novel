@extends('backend.layout')
@section('content')
	<div class="page-container">
		<form action="/backend/category/{{$data['c_id']}}" method="put" class="form form-horizontal" id="form-user-add">
			{{csrf_field()}}
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">
					<span class="c-red">*</span>
					分类名称：</label>
				<div class="formControls col-xs-6 col-sm-6">
					<input type="text" class="input-text" value="{{$data['c_name']}}" placeholder="" name="name">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">
					<span class="c-red">*</span>
					状态：</label>
				<div class="formControls col-xs-6 col-sm-6">
					<select name="show">
						<option value="1" @if ($data['show'] == 1)  selected="selected"  @endif >显示</option>
						<option value="0" @if ($data['show'] == 0)  selected="selected"  @endif >不显示</option>
					</select>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">
					<span class="c-red">*</span>
					排序(数字)：</label>
				<div class="formControls col-xs-6 col-sm-6">
					<input type="text" class="input-text" value="{{$data['priority']}}" placeholder="" name="priority" width="50">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">
					关键词：</label>
				<div class="formControls col-xs-6 col-sm-6">
					<input type="text" class="input-text" value="{{$data['c_keyword']}}" placeholder="" name="keyword">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-2">描述：</label>
				<div class="formControls col-xs-6 col-sm-6">
					<textarea name="description" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符">{{$data['c_description']}}</textarea>
				</div>
			</div>
			<div class="row cl">
				<div class="col-9 col-offset-2">
					<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				</div>
			</div>
		</form>
	</div>

	@if(isset($msg))
		{
		<script>
            $(function(){
                layer.msg('{{$msg}}',{icon:1,time:2000});
            })
		</script>
		}
	@endif

@endsection