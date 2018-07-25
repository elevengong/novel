@extends('frontend.layout')
@section('content')
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="mobile-agent" content="format=[wml|xhtml|html5]; url=https://m.qu.la/book/2125/"/>
        <meta http-equiv="mobile-agent" content="format=html5; url=https://m.qu.la/book/2125/" />
        <meta http-equiv="mobile-agent" content="format=xhtml; url=https://m.qu.la/book/2125/" />

        <title>9527小说</title>
        <meta name="keywords" content="9527小说" />
        <meta name="description" content="9527小说" />
        <link rel="stylesheet" type="text/css" href="{{asset('resources/views/frontend/css/common.css?ver=1.0')}}"/>
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
        <div class="clear"></div>
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

        <div class="clear"></div>
        <div id="content">
            <div id="main">
                <div id="hotnovel">
                    <div class="hostlist">
                        @foreach($hotestNovels as $hotestNovel)
                            <div class="item">
                                <div class="image"><a href="{{url('/novel/'.$hotestNovel['novel_name_pinyin'].'/'.$hotestNovel['n_id'])}}"><img height=150 width=120 src="@if($hotestNovel['novel_cover_path']){{$hotestNovel['novel_cover_path']}}@else{{url('/resources/views/frontend/image/nocover.jpg')}}@endif" alt="{{$hotestNovel['novel_name']}}" /></a></div>
                                <dl>
                                    <dt><span>作者：{{$hotestNovel['author']}}</span><a href="{{url('/novel/'.$hotestNovel['novel_name_pinyin'].'/'.$hotestNovel['n_id'])}}">{{$hotestNovel['novel_name']}}</a></dt>
                                    <dd>    {{strip_tags($hotestNovel['novel_intro'])}}</dd>
                                </dl>
                                <div class="clear"></div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="clr"></div>
                <div id="newscontent">
                    <div class="l">
                        <h2>最新小说更新</h2>
                        <ul>
                            @foreach($latestNovels as $lastestNovel)
                                <li><span class="s1">[{{$lastestNovel['c_name']}}]</span>
                                    <span class="s2">
                                        <a href="{{url('/novel/'.$lastestNovel['novel_name_pinyin'].'/'.$lastestNovel['n_id'])}}">{{$lastestNovel['novel_name']}}</a>
                                    </span>
                                    <span class="s3">
                                        <a href="{{url('/read/'.$lastestNovel['novel_name_pinyin'].'/'.$lastestNovel['lastchapter_id'].'.html')}}" target="_blank">{{$lastestNovel['lastchapter']}}</a>
                                    </span>
                                    <span class="s4">{{$lastestNovel['author']}}</span><span class="s5">{{date('y-m-d',$lastestNovel['lastupdate'])}}</span>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="r">
                        <h2>最新入库小说</h2>
                        <ul>

                            @foreach($latestCreateNovels as $latestCreateNovel)
                                <li><span class="s2"><a href="{{url('/novel/'.$latestCreateNovel['novel_name_pinyin'].'/'.$latestCreateNovel['n_id'])}}">{{$latestCreateNovel['novel_name']}}</a></span><span class="s5">{{$latestCreateNovel['author']}}</span></li>
                            @endforeach
                        </ul></div>
                    <div class="clear"></div></div>
            </div>
        </div>
    </div>

    <div id="firendlink">
        友情连接：
        @foreach($friendLinks as $friendLink)
            <a href="{{$friendLink['web']}}" target="_blank">{{$friendLink['webname']}}</a></li>
        @endforeach
    </div>
@endsection
