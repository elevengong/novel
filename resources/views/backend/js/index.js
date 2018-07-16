function  updatepwd(token){
    layer.prompt( { title: "请输入新密码", formType: 0 }, function( upwd, index ){
        if( !( upwd.length >= 6 && upwd.length <= 20 ) ){
            layer.msg("请输入字母、数字组成的6-20位的密码");
            return false;
        }

        $.ajax({
            type:"post",
            url:"/backend/changeadminpassword",
            dataType:'json',
            headers:{'X-CSRF-TOKEN':token},
            data:{newpwd: upwd},
            success:function(data){
                layer.msg( data.msg );
                layer.close(index);
            },
            error:function (data) {
                layer.msg("修改失败");
                layer.close(index);

            }

        });

    });
}
/*个人信息*/
function myselfinfo(){
    layer.open({
        type: 1,
        area: ['300px','200px'],
        fix: false, //不固定
        maxmin: true,
        shade:0.4,
        title: '查看信息',
        content: '<div>管理员信息</div>'
    });
}

/*资讯-添加*/
function article_add(title,url){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
    layer_show(title,url,w,h);
}
