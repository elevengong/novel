<?php

namespace App\Http\Controllers\backend;

use App\Model\Category;
use App\Model\Chapter;
use App\Model\Novel;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Overtrue\Pinyin\Pinyin;

class NovelController extends BackendController
{
    public function index(Request $request){
        if($request->isMethod('post'))
        {
            $searchWord = request()->input('searchword');
            $novels = Novel::where('novel_name','like',$searchWord.'%')->paginate($this->pageNum);

        }else{
            $novels = Novel::paginate($this->pageNum);

            //做主键做索引的分页
            //select id,title from collect where id>=(select id from collect order by id limit 90000,1) limit 10;

        }
        return view('backend.novel',['datas' => $novels]);

    }

    public function edit(Request $request,$n_id){
        //$novel = DB::table('novel')->where('n_id',$n_id)->get();
        //return view('backend.authoredit',['data' => $novel[0]]);
        //print_r($novel->toArray());
        if($request->isMethod('post')) {
            $data['novel_name'] = request()->input('novel_name');
            $data['novel_cover_path'] = request()->input('novel_cover_path');
            $data['novel_intro'] = request()->input('novel_intro');
            $data['c_id'] = request()->input('c_id');
            $data['lastchapter_id'] = request()->input('lastchapter_id');
            $data['lastchapter'] = request()->input('lastchapter');
            $data['finish'] = request()->input('finish');
            $data['show'] = request()->input('show');
            $data['lastupdate'] = time();
            $data['novel_name_pinyin'] = '';
            //引一个中文转换成拼音的类
            $pinyinClass = new Pinyin();
            $pinyins = $pinyinClass->convert($data['novel_name']);
            foreach ($pinyins as $pinyin)
            {
                $data['novel_name_pinyin'] .= $pinyin;
            }
            $result = Novel::where('n_id',$n_id)->update($data);
            if($result)
            {
                $ReData['msg'] = "修改成功!";
                $ReData['status'] = 1;

            }else{
                $ReData['msg'] = "修改失败!";
                $ReData['status'] = 1;
            }
            echo json_encode($ReData);


        }else{
            $novel = Novel::find($n_id);
            //获取全部分类
            $categories = Category::all()->toArray();
            return view('backend.noveledit',['novel'=> $novel, 'categories'=> $categories]);
        }

    }

    public function show($n_id){
        $chapters = Chapter::where('novel_id',$n_id)->orderBy('chapter_order','asc')->get()->toArray();
        return view('backend.novelshow',['chapters' => $chapters]);
    }

    public function chaptershow($chapter_id){
        echo "chaptershow";exit;

    }




}
