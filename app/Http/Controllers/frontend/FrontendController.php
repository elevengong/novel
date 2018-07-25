<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public $pageNum = '30';
    public $categories = '';

    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
        $categories = Category::where('show','1')->orderBy('priority','desc')->get()->toArray();
        $this->categories = $categories;
    }
}
