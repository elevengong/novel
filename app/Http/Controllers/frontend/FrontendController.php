<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public $pageNum = '10';

    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
    }
}
