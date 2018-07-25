@extends('frontend.layout')
@section('content')
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="mobile-agent" content="format=[wml|xhtml|html5]; url=https://m.qu.la/book/2125/"/>
        <meta http-equiv="mobile-agent" content="format=html5; url=https://m.qu.la/book/2125/" />
        <meta http-equiv="mobile-agent" content="format=xhtml; url=https://m.qu.la/book/2125/" />

        <title>9527小说</title>
        <meta name="keywords" content="{{$novel['novel_name']}}" />
        <meta name="description" content="{{$novel['novel_name']}}" />
        <meta property="og:type" content="????????"/>
        <meta property="og:title" content="{{$novel['novel_name']}}"/>
        <meta property="og:description" content="{{$novel['novel_name']}}"/>
        <meta property="og:image" content="{{$novel['novel_cover_path']}}"/>
        <meta property="og:novel:category" content="{{$novel['c_name']}}"/>
        <meta property="og:novel:author" content="{{$novel['author']}}"/>
        <meta property="og:novel:book_name" content="{{$novel['novel_name']}}"/>
        <meta property="og:novel:read_url" content="?????"/>
        <meta property="og:url" content="?????"/>
        <meta property="og:novel:status" content="连载"/>
        <meta property="og:novel:update_time" content="{{date('Y/m/d h:i:s',$novel['lastupdate'])}}"/>
        <meta property="og:novel:latest_chapter_name" content="{{$novel['lastchapter']}}"/>
        <meta property="og:novel:latest_chapter_url" content="https://www.qu.la/book/94158/5060248.html"/>

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

        <div class="box_con" style="margin:10px auto 0;border-bottom:none;">
            <div class="con_top">
                <a href="{{url('/')}}">9527小说</a> &gt; <a href="{{url('/'.$novel['c_name_pinyin'].'/'.$novel['c_id'])}}">{{$novel['c_name']}}</a>
                &gt; {{$novel['novel_name']}}最新章节列表
            </div>

            <div id="maininfo">
                <div id="fmimg"><img alt="{{$novel['novel_name']}}" src="@if($novel['novel_cover_path']){{$novel['novel_cover_path']}}@else{{url('/resources/views/frontend/image/nocover.jpg')}}@endif" width="120px" height="150px" /><p><a href="{{$novel['n_id']}}" target="_blank">TXT下载</a></p></div>
                <div id="info">
                    <div class="infotitle">
                        <h1>{{$novel['novel_name']}}</h1>
                        <i>作者：{{$novel['author']}}</i>
                        <i>类别：{{$novel['c_name']}}</i>
                        <i>状态：@if($novel['finish']==0)连载中@else已完结@endif</i>
                    </div>
                    <div class="intro">
                        {!! $novel['novel_intro'] !!}
                    </div>
                    <div class="bookurl">
                        <p><b>最新章节：</b><a href="{{$novel['lastchapter_id']}}">{{$novel['lastchapter']}}</a></p>
                    </div>
                    <div class="clear"></div>
                </div>
                <!--/info-->
            </div>
        </div>
        <div style="display: none;">
            ads
        </div>
        <div class="box_con box_con2">
            <div id="list">
                <dl>
                    <dt>《{{$novel['novel_name']}}》</dt>
                    @foreach($chapters as $chapter)
                        <dd><a href="{{url('/read/'.$novel['novel_name_pinyin'].'/'.$chapter['chapter_id'].'.html')}}" title="{{$chapter['chapter_name']}}">{{$chapter['chapter_name']}}</a></dd>
                    @endforeach
                </dl>
            </div>
        </div>


        <div class="footer_link">作者"{{$novel['author']}}"其它小说：
            @foreach($authorOtherNovels as $authorOtherNovel)
                <a target="_blank" href="{{url('/novel/'.$authorOtherNovel['novel_name_pinyin'].'/'.$authorOtherNovel['n_id'])}}" title="{{$authorOtherNovel['novel_name']}}"><span>{{$authorOtherNovel['novel_name']}}</span></a>
            @endforeach
        </div>
    </div>
@endsection
