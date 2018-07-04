<?php

namespace App\Http\Controllers\backend;

use App\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Overtrue\Pinyin\Pinyin;

class CategoryController extends Controller
{
    //get 列表页 backend/category
    public function index(){
        $category_array = Category::orderBy('priority','desc')->get()->toArray();
        return view('backend.category',['categorys' => $category_array]);
    }

    //get 添加页面 backend/category/create
    public function create(){
        return view('backend.categoryadd');
    }

    //post 添加操作 backend/category
    public function store(Request $request){
        if($request->isMethod('post'))
        {
            $data = array();
            $data['c_name'] = request()->input('name');
            $data['show'] = request()->input('show');
            $data['priority'] = request()->input('priority');
            $data['c_keyword'] = request()->input('keyword');
            $data['c_description'] = request()->input('description');
            $data['c_name_pinyin'] = '';

            if(!empty($data['c_name']))
            {
                //引一个中文转换成拼音的类
                $pinyinClass = new Pinyin();
                $pinyins = $pinyinClass->convert($data['c_name']);
                foreach ($pinyins as $pinyin)
                {
                    $data['c_name_pinyin'] .= $pinyin;
                }
                $insert_result = Category::create($data);
                if($insert_result->c_id)
                {
                    return redirect('/backend/category');

                }else{
                    $msg = "添加失败,请重新添加!";
                    return view('backend.categoryadd',['msg' => $msg] );
                }

            }else{
                $msg = "操作错误,请重新添加!";
                return view('backend.categoryadd',['msg' => $msg] );
            }

        }else{
            $msg = "分类名不能为空!";
            return view('backend.categoryadd',['msg' => $msg] );
        }



    }

    //get 单个看的 backend/category/{category}
    public function show(){

    }

    //get 修改的页面 backend/category/{category}/edit
    public function edit($c_id){
        $data = Category::where('c_id',$c_id)->get()->toArray();
        return view('backend.categoryedit',['data' => $data['0']]);

    }

    //put 修改的操作 backend/category/{category}
    public function update($c_id){
        echo "sfsdf";

    }

    //delete 删除 backend/category/{category}
    public function destroy($c_id){
        $result = Category::destroy($c_id);
        if($result)
        {
            $data = array('msg' => "删除成功");
            return json_encode($data);
        }else{
            return false;
        }

        //return json_encode($data);


    }



}
