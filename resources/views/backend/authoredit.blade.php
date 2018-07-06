@extends('backend.layout')
@section('content')
    <div class="page-container">
        <form action="/backend/author/{{$data->author_id}}/edit" method="post" class="form form-horizontal" id="form-user-add">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    作者：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="text" class="input-text" value="{{$data->author}}" placeholder="" name="author">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    图片：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <img src="{{$data->author_cover_path}}" width="30px;"/>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    介绍：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <textarea name="author_intro" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符">{{$data->author_intro}}</textarea>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    关键词：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="text" class="input-text" value="{{$data->author_keyword}}" placeholder="" name="author_keyword">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">描述：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <textarea name="author_description" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符">{{$data->author_description}}</textarea>
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




@endsection