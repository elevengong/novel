@extends('backend.layout')
@section('content')
    <div class="page-container">
        <form action="#" method="post" class="form form-horizontal" id="form">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    网站名：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="text" class="input-text" value="" name="webname" id="webname">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    网址：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="text" class="input-text" value="" name="web" id="web">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    显示：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <select name="status" id="status">
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
                    <input type="text" class="input-text" value="0" name="priority" width="50" id="priority">
                </div>
            </div>

            <div class="row cl">
                <div class="col-9 col-offset-2">
                    <input class="btn btn-primary radius" id="addlink"  type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
        $(function () {
            $('#addlink').click(function () {
                var webname = $('#webname').val();
                var web = $('#web').val();
                var status = $('#status').val();
                var priority = $('#priority').val();

                if(webname == '' || web == '')
                {
                    layer.msg("网站名和网址都不能为空");
                    return false;
                }

                $.ajax({
                    type:"post",
                    url:"/backend/system/friendlinkadd",
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$("input[name='_token']").val()},
                    data:{webname: webname, web:web, status:status, priority:priority},
                    success:function(data){
                        if(data.status == 1)
                        {
                            window.parent.location.reload();
                            window.location.close();
                            layer.msg(data.msg);
                        }else{
                            layer.msg(data.msg);
                        }
                    },
                    error:function (data) {
                        layer.msg("添加失败");

                    }

                });

                return false;
            });

        });


    </script>

@endsection