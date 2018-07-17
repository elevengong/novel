@extends('backend.layout')
@section('content')
    <div class="page-container">
        <form action="#" method="post" class="form form-horizontal" id="form1">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    小说：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="text" class="input-text" value="{{$novel->novel_name}}" placeholder="" name="novel_name" id="novel">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    图片：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="button" value="上传图片" onclick="photo.click()" style="float:left;margin-top:10px;" class="btn_mouseout"/>
                    <p><input type="file" id="photo" name="photo" onchange="upload(this);" style="display:none"/></p>
                    <div id="showphoto" style="float:left;padding-left:7px;">@if($novel->novel_cover_path)<img src="{{$novel->novel_cover_path}}" width="50px;" />@endif</div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    介绍：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <textarea id="intro" name="novel_intro" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符">{{$novel->novel_intro}}</textarea>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    小说分类：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <select name="c_id" style="float:left;" id="c_id">
                        @foreach($categories as $category)
                        <option value="{{$category['c_id']}}" @if($novel->c_id == $category['c_id'])selected="selected"@endif>{{$category['c_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    最新单节ID：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="text" class="input-text" value="{{$novel->lastchapter_id}}" placeholder="" name="lastchapter_id" id="lastchapter_id">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    最新单节：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="text" class="input-text" value="{{$novel->lastchapter}}" placeholder="" name="lastchapter" id="lastchapter">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    状态：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <select name="finish" style="float:left;" id="finish">
                        <option value="1" @if($novel->finish == 1)selected="selected"@endif>完结</option>
                        <option value="0" @if($novel->finish == 0)selected="selected"@endif>未完结</option>
                    </select>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    是否显示：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <select name="show" style="float:left;" id="show">
                        <option value="1" @if($novel->show == 1)selected="selected"@endif>显示</option>
                        <option value="0" @if($novel->show == 0)selected="selected"@endif>不显示</option>
                    </select>
                </div>
            </div>
            <div class="row cl">
                <div class="col-9 col-offset-2">
                    <input class="btn btn-primary radius" type="button" onclick="novel_edit({{$novel->n_id}})" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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

    <script>
        function novel_edit(n_id){
            var novel = $.trim( $("#novel").val() );
            var photo_path = $.trim( $('#img').attr('src') );
            var intro = $.trim( $("#intro").val() );
            var c_id = $.trim( $("#c_id").val() );
            var lastchapter_id = $.trim( $("#lastchapter_id").val() );
            var lastchapter = $.trim( $("#lastchapter").val() );
            var finish = $.trim( $("#finish").val() );
            var show = $.trim( $("#show").val() );
            //alert(novel);return false;
            if( novel == ""  ){
                layer.msg("小说名不能为空");
                return;
            }
            if( $.inArray(finish, ['0', '1']) == -1){
                layer.msg("状态异常");
                return;
            }
            $.ajax({
                type:"post",
                url:"/backend/novel/"+ n_id +"/edit",
                dataType:'json',
                headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                data:{'novel_name':novel, 'novel_cover_path':photo_path, 'novel_intro':intro, 'c_id':c_id, 'lastchapter_id':lastchapter_id, 'lastchapter':lastchapter, 'finish':finish, 'show':show},
                success:function(data){
                    if(data.status == 1)
                    {
                        window.parent.location.reload();
                        window.parent.layer.msg( data.msg );
                    }else{
                        layer.msg( data.msg );
                    }
                },
                error:function (data) {
                    layer.msg(data.msg);
                }
            });

        }




        function upload(){
            var animateimg = $("#photo").val(); //获取上传的图片名 带//
            var imgarr=animateimg.split('\\'); //分割
            var myimg=imgarr[imgarr.length-1]; //去掉 // 获取图片名
            var houzui = myimg.lastIndexOf('.'); //获取 . 出现的位置
            var ext = myimg.substring(houzui, myimg.length).toUpperCase();  //切割 . 获取文件后缀

            var file = $('#photo').get(0).files[0]; //获取上传的文件
            var fileSize = file.size;           //获取上传的文件大小
            var maxSize = 1048576;              //最大1MB
            if(ext !='.PNG' && ext !='.GIF' && ext !='.JPG' && ext !='.JPEG' && ext !='.BMP'){
                layer.msg('文件类型错误,请上传图片类型');
                return false;
            }else if(parseInt(fileSize) >= parseInt(maxSize)){
                layer.msg('上传的文件不能超过1MB');
                return false;
            }else{
                var data = new FormData($('#form1')[0]);
                var type = 2;

                $.ajax({
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    url: "/backend/uploadphoto/"+type,
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    cache: false,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        if(data.status == 0)
                        {
                            layer.msg( data.msg );

                        }else{
                            //window.location.reload();
                            var result = '<img id="img" src="'+data.pic+'" width="50">';
                            $('#showphoto').html(result);
                        }

                    },
                    error:function (data) {
                        layer.msg(data.msg);

                    }
                });
                return false;
            }
        }

    </script>




@endsection