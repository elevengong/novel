<?php

namespace App\Http\Controllers\backend;

use App\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $categorys = Category::all();
    }

    //还有很多，用php artisan route:list去查看这个category的方法
}
