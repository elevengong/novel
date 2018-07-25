@extends('frontend.layout')
@section('content')
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="mobile-agent" content="format=[wml|xhtml|html5]; url=https://m.qu.la/book/2125/"/>
        <meta http-equiv="mobile-agent" content="format=html5; url=https://m.qu.la/book/2125/" />
        <meta http-equiv="mobile-agent" content="format=xhtml; url=https://m.qu.la/book/2125/" />

        <title>更新列表</title>
        <meta name="keywords" content="更新列表" />
        <meta name="description" content="更新列表" />
        <link rel="stylesheet" type="text/css" href="{{asset('resources/views/frontend/css/common.css?ver=1.1')}}"/>
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
                <li><a href="/complete">完本小说</a></li>
                <li><a href="/updatelist">更新列表</a></li>
            </ul>
        </div>

        <div class="clear"></div>


        <div id="content">
            <div id="main">
                <div class="clr"></div>
                <div id="updatelist">

                    <h2>最近更新</h2>
                    <ul>
                        @foreach($novelLists as $novelList)
                            <li><span class="s1">[{{$novelList['c_name']}}]</span><span class="s2"><a href="{{url('/novel/'.$novelList['novel_name_pinyin'].'/'.$novelList['n_id'])}}">{{$novelList['novel_name']}}</a></span><span class="s3"><a href="{{url('/read/'.$novelList['novel_name_pinyin'].'/'.$novelList['lastchapter_id'].'.html')}}" target="_blank">{{$novelList['lastchapter']}}</a></span><span class="s4">{{$novelList['author']}}</span><span class="s5">{{date('Y-m-d h:i:s',$novelList['lastupdate'])}}</span></li>
                        @endforeach
                    </ul>
                    <div class="clr"></div>
                    <div class="pages">
                        {{$novelLists->links()}}
                    </div>
                    <div class="clr"></div>

                    <div class="clear"></div></div>
            </div>


        </div>


    </div>

    </div>
@endsection
