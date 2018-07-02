<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function welcome(){
        return view('backend.welcome');

    }

    public function index(){
        return view('backend.index');

    }

}
