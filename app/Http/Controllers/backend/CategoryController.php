<?php

namespace App\Http\Controllers\backend;

use App\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //get 列表页
    public function index(){
        $category = Category::orderBy('priority','desc')->get();
        $category_array = $category->toArray();
        return view('backend.category',['categorys' => $category_array]);
    }

    //get 添加页面
    public function create(){
        return view('backend.categoryadd');
    }

    //post 添加操作
    public function store(Request $request){
        if($request->isMethod('post'))
        {
            $data = array();
            $data['name'] = request()->input('name');
            $data['show'] = request()->input('show');
            $data['priority'] = request()->input('priority');
            $data['keyword'] = request()->input('keyword');
            $data['description'] = request()->input('description');

            if(!empty($data['name']))
            {
                //引一个中文转换成拼音的类


            }else{
                $msg = "操作错误,请重新添加!";
                return view('backend.categoryadd',['msg' => $msg] );
            }

        }else{
            $msg = "类名不能为空!";
            return view('backend.categoryadd',['msg' => $msg] );
        }



    }

    //get 单个看的
    public function show(){

    }

    //get 修改的页面
    public function edit(){

    }

    //put 修改的操作
    public function update(){

    }

    //delete 删除
    public function destroy(){

    }



}
