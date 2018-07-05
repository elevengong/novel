<?php

namespace App\Http\Controllers\backend;

use App\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Overtrue\Pinyin\Pinyin;
use Symfony\Component\Console\Input\InputArgument;

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
                    $ReData['msg'] = "添加成功";
                    $ReData['status'] = 1;
                    return view('backend.categoryadd',['data' => $ReData]);

                }else{
                    $ReData['msg'] = "添加失败,请重新添加!";
                    $ReData['status'] = 0;
                    return view('backend.categoryadd',['data' => $ReData] );
                }

            }else{
                $ReData['msg'] = "操作错误,请重新添加!";
                $ReData['status'] = 0;
                return view('backend.categoryadd',['data' => $ReData] );
            }

        }else{
            $ReData['msg'] = "分类名不能为空!";
            $ReData['status'] = 0;
            return view('backend.categoryadd',['data' => $ReData] );
        }



    }

    //get 单个看的 backend/category/{category}
    public function show(){
        return redirect('/backend/category');
    }

    //get 修改的页面 backend/category/{category}/edit
    public function edit($c_id){
        $data = Category::find($c_id)->toArray();
        //$data = Category::where('c_id',$c_id)->get()->toArray();
        return view('backend.categoryedit',['data' => $data]);

    }

    //put 修改的操作 backend/category/{category}
    public function update($c_id,Request $request){
        $data = $request->except(['_token','_method']);
        $data['c_name_pinyin'] = '';

        //这里要验证一下拼音,因为名字有可能会改的
        $pinyinClass = new Pinyin();
        $pinyins = $pinyinClass->convert($data['c_name']);
        foreach ($pinyins as $pinyin)
        {
            $data['c_name_pinyin'] .= $pinyin;
        }

        $result = Category::where('c_id',$c_id)->update($data);
        if($result == 1)
        {
            $ReData['msg'] = "修改成功!";
            $ReData['status'] = 1;
            return back()->with('data',$ReData);

        }else{
            $ReData['msg'] = "修改失败!";
            $ReData['status'] = 0;
            return back()->with('data',$ReData);
        }

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
