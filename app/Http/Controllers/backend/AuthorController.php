<?php

namespace App\Http\Controllers\backend;

use App\Model\Author;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Overtrue\Pinyin\Pinyin;

class AuthorController extends BackendController
{

    public function index(Request $request){
        if($request->isMethod('post'))
        {
            $searchWord = request()->input('searchword');
            $authors = Author::where('author','like',$searchWord.'%')->paginate($this->pageNum);

        }else{
            $authors = Author::paginate($this->pageNum);
        }
        return view('backend.author',['datas' => $authors]);

    }

    public function edit(Request $request,$author_id){
        if($request->isMethod('post')){
            $data['author'] = request()->input('author');
            $data['author_cover_path'] = request()->input('author_cover_path');
            $data['author_intro'] = request()->input('intro');
            $data['author_keyword'] = request()->input('keyword');
            $data['author_description'] = request()->input('description');
            $data['status'] = request()->input('status');
            $data['author_pinyin'] ='';
            //引一个中文转换成拼音的类
            $pinyinClass = new Pinyin();
            $pinyins = $pinyinClass->convert($data['author']);
            foreach ($pinyins as $pinyin)
            {
                $data['author_pinyin'] .= $pinyin;
            }

            $result = Author::where('author_id',$author_id)->update($data);
            if($result)
            {
                $ReData['status'] = 1;
                $ReData['msg'] = "修改成功!";

            }else{
                $ReData['status'] = 0;
                $ReData['msg'] = "修改失败!";
            }
            echo json_encode($ReData);
        }else{
            $author = Author::where('author_id',$author_id)->get();
            //echo Author::where('author_id',$author_id)->toSql();
            return view('backend.authoredit',['data' => $author[0]]);
        }



    }

}
