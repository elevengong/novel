@extends('frontend.layout')
@section('content')
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="mobile-agent" content="format=[wml|xhtml|html5]; url=https://m.qu.la/book/2125/"/>
        <meta http-equiv="mobile-agent" content="format=html5; url=https://m.qu.la/book/2125/" />
        <meta http-equiv="mobile-agent" content="format=xhtml; url=https://m.qu.la/book/2125/" />

        <title>{{$chapter['chapter_name']}}_{{$chapter['novel_name']}}</title>
        <meta name="keywords" content="9527小说" />
        <meta name="description" content="9527小说" />
        <link rel="stylesheet" type="text/css" href="{{asset('/resources/views/frontend/css/common.css?ver=1.3')}}"/>
        <link rel="shortcut icon" href="{{asset('/resources/views/frontend/image/favicon.ico')}}" />
    </head>
    <body>
    <div id="wrapper">
        <div class="header">
            <div class="header_logo"><a href="{{url('/')}}">9527小说 </a></div>
            <div class="header_search">
                <form name="articlesearch" method="post" action="{{url('/search')}}" target="_blank">
                    <input type="text" name="searchkey" class="search"  id="search_keyword" placeholder="请输入小说名" />
                    <button type="submit">搜索</button>
                </form></div>
        </div>
        <div class="nav">
            <ul>
                <li><a href="{{url('/')}}">首页</a></li>
                @foreach($categories as $category)
                    <li><a href="{{url('/'.$category['c_name_pinyin'].'/'.$category['c_id'])}}">{{$category['c_name']}}</a></li>
                @endforeach
                <li><a href="{{url('/complete')}}">完本小说</a></li>
                <li><a href="{{url('/updatelist')}}">更新列表</a></li>
            </ul>
        </div>

        <div class="content_read" id="wrap">

            <div class="box_con" id="Content">
                <div id="sitebar"><span><a target="_blank" href="{{url('/novel/'.$chapter['n_id'].'/download/')}}"><<{{$chapter['novel_name']}}>>TXT下载</a></span>
                    <a href="{{url('/')}}">9527小说</a>&gt;<a href="{{url('/'.$chapter['c_name_pinyin'].'/'.$chapter['c_id'])}}">{{$chapter['c_name']}}</a>&gt;
                    <a href="{{url('/novel/'.$chapter['novel_name_pinyin'].'/'.$chapter['n_id'])}}">{{$chapter['novel_name']}}</a></div>
                <div class="bookname">
                    <h1>{{$chapter['chapter_name']}}</h1>
                    <div class="bottem1">
                        <a href="@if($chapter['pre_chapter_id']!=0){{url('/read/'.$chapter['novel_name_pinyin'].'/'.$chapter['pre_chapter_id'].'.html')}}@else{{url('/novel/'.$chapter['novel_name_pinyin'].'/'.$chapter['n_id'])}}@endif">上一章</a> &larr;
                        <a href="{{url('/novel/'.$chapter['novel_name_pinyin'].'/'.$chapter['n_id'])}}">章节列表</a> &rarr;
                        <a href="@if($chapter['next_chapter_id']!=0){{url('/read/'.$chapter['novel_name_pinyin'].'/'.$chapter['next_chapter_id'].'.html')}}@else{{url('/novel/'.$chapter['novel_name_pinyin'].'/'.$chapter['n_id'])}}@endif">下一章</a>
                    </div>
                    <div class="lm"></div>
                </div>
                <div id="LeftMain">
                    <div id="BookText">
                        {!! $chapter['content'] !!}
                    </div>
                    <div class="bottem1">
                        <a href="@if($chapter['pre_chapter_id']!=0){{url('/read/'.$chapter['novel_name_pinyin'].'/'.$chapter['pre_chapter_id'].'.html')}}@else{{url('/novel/'.$chapter['novel_name_pinyin'].'/'.$chapter['n_id'])}}@endif">上一章</a> &larr;
                        <a href="{{url('/novel/'.$chapter['novel_name_pinyin'].'/'.$chapter['n_id'])}}">章节列表</a> &rarr;
                        <a href="@if($chapter['next_chapter_id']!=0){{url('/read/'.$chapter['novel_name_pinyin'].'/'.$chapter['next_chapter_id'].'.html')}}@else{{url('/novel/'.$chapter['novel_name_pinyin'].'/'.$chapter['n_id'])}}@endif">下一章</a>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
        </div>
    </div>
@endsection
