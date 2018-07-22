<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends FrontendController
{
    public function index(){
        return view('frontend.index');
    }

    public function novel(){
        return view('frontend.novel');
    }

    public function chapter(){
        return view('frontend.chapter');
    }
















}
