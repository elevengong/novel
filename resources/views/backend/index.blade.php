﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="{{asset('/resources/views/backend/static/favicon.ico')}}" >
<link rel="Shortcut Icon" href="{{asset('/resources/views/backend/static/favicon.ico')}}" />
<!--[if lt IE 9]>
	<script type="text/javascript" src="{{asset('/resources/views/backend/lib/html5shiv.js')}}"></script>
	<script type="text/javascript" src="{{asset('/resources/views/backend/lib/respond.min.js')}}"></script>
<![endif]-->
	<link rel="stylesheet" type="text/css" href="{{asset('/resources/views/backend/static/h-ui/css/H-ui.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('/resources/views/backend/static/h-ui.admin/css/H-ui.admin.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('/resources/views/backend/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('/resources/views/backend/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
	<link rel="stylesheet" type="text/css" href="{{asset('/resources/views/backend/static/h-ui.admin/css/style.css')}}" />
<!--[if IE 6]>
	<script type="text/javascript" src="{{asset('/resources/views/backend/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>9527小说后面管理系统</title>
<meta name="keywords" content="小说后面管理系统">
<meta name="description" content="小说后面管理系统">
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="{{url('/backend/index')}}">Eleven小说管理后台1.0</a>
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>

		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
			<ul class="cl">
				<li>管理员</li>
				<li class="dropDown dropDown_hover">
					<a href="#" class="dropDown_A">{{session('admin')}} <i class="Hui-iconfont">&#xe6d5;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:updatepwd('{{csrf_token()}}')">修改密码</a></li>
						<li><a href="{{url('/backend/logout')}}">退出</a></li>
				</ul>
			</li>
				<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" data-val="default" title="默认（蓝色）">蓝色</a></li>
						<li><a href="javascript:;" data-val="blue" title="黑色）">黑色</a></li>
						<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
						<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
						<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
						<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
</header>
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">

		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 小说管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/backend/category')}}" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
					<li><a data-href="{{url('/backend/author')}}" data-title="作者管理" href="javascript:void(0)">作者管理</a></li>
					<li><a data-href="{{url('/backend/novel')}}" data-title="小说管理" href="javascript:void(0)">小说管理</a></li>
			    </ul>
		    </dd>
	    </dl>

		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 前端管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/backend/frontend/footer')}}" data-title="修改footer" href="javascript:void(0)">footer修改</a></li>
				</ul>
			</dd>
		</dl>

		</dl>
		<dl id="menu-system">
		<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/backend/system/friendlink')}}" data-title="友情链接" href="javascript:void(0)">友情链接</a></li>
				</ul>
			</dd>
		</dl>



		{{--<dl id="menu-picture">--}}
			{{--<dt><i class="Hui-iconfont">&#xe613;</i> 图片管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>--}}

	{{--</dl>--}}

		{{--<dl id="menu-comments">--}}
			{{--<dt><i class="Hui-iconfont">&#xe622;</i> 评论管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>--}}

	{{--</dl>--}}
		{{--<dl id="menu-member">--}}
			{{--<dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>--}}

	{{--</dl>--}}
		{{--<dl id="menu-admin">--}}
			{{--<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>--}}

	{{--</dl>--}}
		{{--<dl id="menu-tongji">--}}
			{{--<dt><i class="Hui-iconfont">&#xe61a;</i> 系统统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>--}}

	{{--</dl>--}}
		{{--<dl id="menu-system">--}}
			{{--<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>--}}

	{{--</dl>--}}
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="我的桌面" data-href="welcome.html">我的桌面</span>
					<em></em></li>
		</ul>
	</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="{{url('/backend/welcome')}}"></iframe>
	</div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
</ul>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('/resources/views/backend/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/resources/views/backend/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('/resources/views/backend/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/resources/views/backend/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('/resources/views/backend/lib/jquery.contextmenu/jquery.contextmenu.r2.js')}}"></script>

<script type="text/javascript" src="{{asset('/resources/views/backend/js/index.js')}}"></script>



</body>
</html>