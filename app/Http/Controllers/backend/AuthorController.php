<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{

    public function index(Request $request){
        if($request->isMethod('post'))
        {
            $searchWord = request()->input('searchword');
            $authors = DB::table('author')->where('author','like',$searchWord.'%')->paginate(10);

        }else{
            $authors = DB::table('author')->paginate(10);
            //echo $this->abc();exit;
            //print_r($author->items());exit;
        }
        return view('backend.author',['datas' => $authors]);

    }

//    public function abc(){
//        return "abc";
//    }

    public function edit($author_id){

        $author = DB::table('author')->where('author_id',$author_id)->get();
        return view('backend.authoredit',['data' => $author[0]]);





    }

}
