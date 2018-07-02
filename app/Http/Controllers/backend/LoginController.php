<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Crypt;
use resources\org\code\vcode;
//require_once '\resources\org\code\vcode.php';
class LoginController extends Controller
{
    public function login(Request $request){

        if($request->isMethod('post'))
        {
            $name = request()->input('name');
            $pwd = request()->input('pwd');
            $code = request()->input('code');

            //验证







        }else{
            //echo Crypt::encrypt('123963');exit;
            //$str='eyJpdiI6Im1uOUhjZXlPTlNJb2xmTXFObWdDUGc9PSIsInZhbHVlIjoibXU3QmZ3c28wY3ozVnBTYUdIUytWdz09IiwibWFjIjoiOTE3YTBlMWYyMWI5NTMwMzVlMTRlNjcxMzNhYjdlZDQyMWI5OThlOGEzZTA5MTQ2MjAyZmZhZmRhZjk5YzhmNiJ9';
            //echo Crypt::decrypt($str);exit;
            return View('backend.login');
        }



    }

    public function logout(){
        echo "logout";
    }

    public function code(){
        $vcode = new \Vcode(80, 40, 4);
        //参数（宽，高，验证码的数量）
        //将验证码放到服务器自己的空间保存一份
        session(['code' => $vcode->getcode()]);
        //将验证码图片输出
        $vcode->outimg();
        dump($vcode);
    }











}

