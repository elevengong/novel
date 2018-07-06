<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NovelController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post'))
        {
            $searchWord = request()->input('searchword');
            $novels = DB::table('novel')->where('novel_name','like',$searchWord.'%')->paginate(10);

        }else{
            $novels = DB::table('novel')->paginate(10);

            //做主键做索引的分页
            //select id,title from collect where id>=(select id from collect order by id limit 90000,1) limit 10;

        }
        return view('backend.novel',['datas' => $novels]);

    }

    public function edit($n_id){
        //$novel = DB::table('novel')->where('n_id',$n_id)->get();
        //return view('backend.authoredit',['data' => $novel[0]]);

    }

    public function idbyname($name,$id){
        echo $name.$id."aaaaaaaaaa";

    }

}
