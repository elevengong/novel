<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends FrontendController
{
    public function index(){
        return view('frontend.index');
    }
}
