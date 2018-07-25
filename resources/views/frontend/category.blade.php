@extends('frontend.layout')
@section('content')
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="mobile-agent" content="format=[wml|xhtml|html5]; url=https://m.qu.la/book/2125/"/>
        <meta http-equiv="mobile-agent" content="format=html5; url=https://m.qu.la/book/2125/" />
        <meta http-equiv="mobile-agent" content="format=xhtml; url=https://m.qu.la/book/2125/" />

        <title>{{$catalog['c_name']}}</title>
        <meta name="keywords" content="{{$catalog['c_keyword']}}" />
        <meta name="description" content="{{$catalog['c_description']}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('resources/views/frontend/css/common.css?ver=1.0')}}"/>
        <link rel="shortcut icon" href="{{asset('/resources/views/frontend/image/favicon.ico')}}" />
    </head>
    <body>
    <div id="wrapper">

        <div class="header">
            <div class="header_logo"><a href="{{url('/')}}">9527小说 </a></div>
            <div class="header_search">
                <form name="articlesearch" method="post" action="{{url('/search')}}" target="_blank">
                    {{csrf_field()}}
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

                    <div class="clr"></div>
                    <div id="newscontent">
                        <div class="l">
                            <h2>最新{{$catalog['c_name']}}更新</h2>
                            <ul>
                                @foreach($latestNovels as $lastestNovel)
                                    <li>
                                        <span class="s1">[{{$lastestNovel['c_name']}}]</span>
                                        <span class="s2"><a href="{{url('/novel/'.$lastestNovel['novel_name_pinyin'].'/'.$lastestNovel['n_id'])}}">{{$lastestNovel['novel_name']}}</a></span>
                                        <span class="s3"><a href="{{url('/read/'.$lastestNovel['novel_name_pinyin'].'/'.$lastestNovel['lastchapter_id'].'.html')}}" target="_blank">{{$lastestNovel['lastchapter']}}</a></span>
                                        <span class="s4">{{$lastestNovel['author']}}</span>
                                        <span class="s5">{{date('y-m-d',$lastestNovel['lastupdate'])}}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="clr"></div>
                            <div class="pages">
                                {{$latestNovels->links()}}
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="r">
                            <h2>热门{{$catalog['c_name']}}</h2>
                            <ul>
                                @foreach($hotestNovels as $hotestNovel)
                                    <li><span class="s2"><a href="{{url('/novel/'.$hotestNovel['novel_name_pinyin'].'/'.$hotestNovel['n_id'])}}">{{$hotestNovel['novel_name']}}</a></span><span class="s5">{{$hotestNovel['author']}}</span></li>
                                @endforeach
                            </ul></div>
                        <div class="clear"></div></div>
                </div></div>


        </div>

    </div>

@endsection
