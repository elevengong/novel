<?php

namespace App\Http\Controllers\frontend;

use App\Model\Category;
use App\Model\Chapter;
use App\Model\FriendLink;
use App\Model\Novel;
use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends FrontendController
{
    public function index(){
        $categories = $this->categories;
        $latestNovels = Novel::select('novel.n_id','novel.novel_name','novel.novel_name_pinyin','novel.lastchapter','novel.lastchapter_id','novel.lastupdate','author.author','author.author_id','category.c_name')
            ->leftJoin('author', function ($join){
                $join->on('author.author_id', '=', 'novel.author_id');
            })
            ->leftJoin('category', function ($join){
                $join->on('category.c_id', '=', 'novel.c_id');
            })
            ->where('novel.show','1')->orderBy('novel.lastupdate','desc')->offset(0)->limit(30)->get()->toArray();

        $latestCreateNovels = Novel::select('novel.n_id','novel.novel_name','novel.novel_name_pinyin','author.author','author.author_id')
            ->leftJoin('author',function ($join){
                $join->on('author.author_id','=','novel.author_id');
            })
            ->where('novel.show','1')->orderBy('novel.postdate')->offset(0)->limit(30)->get()->toArray();

        $hotestNovels = Novel::select('novel.n_id','novel.novel_name','novel_intro','novel.novel_cover_path','novel.novel_name_pinyin','author.author','author.author_id')
            ->leftJoin('author',function ($join){
                $join->on('author.author_id','=','novel.author_id');
            })
            ->where('novel.show','1')->orderBy('novel.visit','desc')->offset(0)->limit(6)->get()->toArray();

        $friendLinks = FriendLink::orderBy('priority','desc')->get()->toArray();
        return view('frontend.index',compact('categories','latestNovels','friendLinks','latestCreateNovels','hotestNovels'));
    }

    public function category($pinyin,$c_id){
        $categories = $this->categories;
        $catalog = Category::select('c_name','c_keyword','c_description')->find($c_id)->toArray();

        $latestNovels = Novel::select('novel.n_id','novel.novel_name','novel.novel_name_pinyin','novel.lastchapter','novel.lastchapter_id','novel.lastupdate','author.author','author.author_id','category.c_name')
            ->leftJoin('author', function ($join){
                $join->on('author.author_id', '=', 'novel.author_id');
            })
            ->leftJoin('category', function ($join){
                $join->on('category.c_id', '=', 'novel.c_id');
            })
            ->where('novel.show','1')->where('novel.c_id',$c_id)->orderBy('novel.lastupdate','desc')->paginate($this->pageNum);

        $hotestNovels = Novel::select('novel.n_id','novel.novel_name','novel.novel_name_pinyin','author.author','author.author_id')
            ->leftJoin('author',function ($join){
                $join->on('author.author_id','=','novel.author_id');
            })
            ->where('novel.show','1')->where('novel.c_id',$c_id)->orderBy('novel.visit','desc')->offset(0)->limit(30)->get()->toArray();

        return view('frontend.category',compact('categories','catalog','latestNovels','hotestNovels'));

    }

    public function novel($pinyin,$n_id){
        $categories = $this->categories;

        $novel = Novel::select('novel.*','author.author','author.author_pinyin','author.author_id','category.c_name','category.c_name_pinyin')
            ->leftJoin('author', function ($join){
                $join->on('author.author_id', '=', 'novel.author_id');
            })
            ->leftJoin('category', function ($join){
                $join->on('category.c_id', '=', 'novel.c_id');
            })
            ->where('novel.show','1')->find($n_id);

        $chapters = Chapter::select('chapter.*')->where('novel_id',$n_id)->orderBy('chapter_order','asc')->get()->toArray();

        $authorOtherNovels = Novel::select('n_id','novel_name','novel_name_pinyin')->where('author_id',$novel['author_id'])->get()->toArray();

        return view('frontend.novel',compact('categories','novel','chapters','authorOtherNovels'));

    }

    public function chapter($pinyin,$chapter_id){
        $categories = $this->categories;
        $chapter = Chapter::select('category.c_name','category.c_id','category.c_name_pinyin','novel.postdate','novel.novel_name_pinyin','novel.novel_name','novel.n_id','chapter.chapter_name','chapter.pre_chapter_id','chapter.next_chapter_id')
            ->leftJoin('novel',function ($join){
                $join->on('chapter.novel_id','=','novel.n_id');
            })
            ->leftJoin('category',function ($join){
                $join->on('novel.c_id','=','category.c_id');
            })
            ->find($chapter_id);

        $chapterTxt = resource_path('novelchapter').DIRECTORY_SEPARATOR.date('Ymd',$chapter['postdate']).DIRECTORY_SEPARATOR.$chapter['n_id'].DIRECTORY_SEPARATOR. $chapter_id.".txt";;
        $txtContent = '';
        $myfile = fopen($chapterTxt, "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $txtContent = $txtContent.fgets($myfile);
        }
        fclose($myfile);
        $chapter['content'] = $txtContent;
        //print_r($txtContent);exit;


        return view('frontend.chapter',compact('categories','chapter'));
    }

    public function noveldownload(){
        echo 'download';exit;
    }

    public function updatelist(){
        $categories = $this->categories;

        $novelLists = Novel::select('novel.n_id','novel.c_id','novel.novel_name','novel.novel_name_pinyin','novel.lastupdate','novel.lastchapter','novel.lastchapter_id','novel.author_id','category.c_name','author.author','author.author_pinyin')
            ->leftJoin('author',function ($join){
                $join->on('author.author_id','=','novel.author_id');
            })
            ->leftJoin('category',function ($join){
                $join->on('category.c_id','=','novel.c_id');
            })->where('novel.show',1)->orderBy('novel.lastupdate','desc')->paginate($this->pageNum);

        return view('frontend.updatelist',compact('categories','novelLists'));
    }

    public function complete(){
        $categories = $this->categories;
        $novelLists = Novel::select('novel.n_id','novel.c_id','novel.novel_name','novel.novel_name_pinyin','novel.lastupdate','novel.lastchapter','novel.lastchapter_id','novel.author_id','category.c_name','author.author','author.author_pinyin')
            ->leftJoin('author',function ($join){
                $join->on('author.author_id','=','novel.author_id');
            })
            ->leftJoin('category',function ($join){
                $join->on('category.c_id','=','novel.c_id');
            })->where('novel.show',1)->where('novel.finish','1')->orderBy('novel.lastupdate','desc')->paginate($this->pageNum);

        return view('frontend.complete',compact('categories','novelLists'));
    }

    public function search(Request $request){
        $categories = $this->categories;
        $searchKey = request()->input('searchkey');
        if(empty($searchKey))
        {
            $novelLists = array();
        }else{
            $novelLists = Novel::select('novel.n_id','novel.c_id','novel.novel_name','novel.novel_name_pinyin','novel.lastupdate','novel.lastchapter','novel.lastchapter_id','novel.author_id','category.c_name','author.author','author.author_pinyin')
                ->leftJoin('author',function ($join){
                    $join->on('author.author_id','=','novel.author_id');
                })
                ->leftJoin('category',function ($join){
                    $join->on('category.c_id','=','novel.c_id');
                })->where('novel.show',1)->where('novel.novel_name','like',$searchKey.'%')->orderBy('novel.lastupdate','desc')->paginate($this->pageNum);
        }

        return view('frontend.search',compact('categories','novelLists','searchKey'));

    }














}
