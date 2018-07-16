$(function(){
    $("#login").click( function(){
        var name = $("#name").val();
        var pwd = $("#pwd").val();
        var code = $("#code").val();

        if( !( name.length >= 5 && name.length <= 20 ) ){
            layer.msg("请输入字母、数字组成的5-20位的用户名");
            $('#name').focus();
            return false;
        }

        if( !( pwd.length >= 6 && pwd.length <= 20 ) ){
            layer.msg("请输入字母、数字组成的6-20位的密码");
            $('#pwd').focus();
            return false;
        }

        if( code.length != 4 ){
            layer.msg("验证码只能是4位数");
            $('#code').focus();
            return false;
        }
        var datas = { name: name, pwd: pwd, code: code};
        $.ajax({
            type:"post",
            url:"/backend/login",
            dataType:'json',
            headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
            data:datas,
            success:function(data){
                if(data.status == 1)
                {
                    layer.msg( data.msg );
                    window.location.href = "/backend/index";
                }else{
                    layer.msg( data.msg );
                    return false;
                }

                return false;
            },
            error:function (data) {
                layer.msg( data.msg );
                return false;

            }
        });
    } );
});