<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Model\Admin;

//require_once 'resources/org/code/svcode.php';
class LoginController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post'))
        {
            $name = request()->input('name');
            $pwd = request()->input('pwd');
            $code = request()->input('code');
            $data = array();
            //验证
            if(!empty($name) or !empty($pwd) or !empty($code))
            {
                if(strtolower($code) == strtolower(session('code')))
                {
                    $result = Admin::where('name',$name)->get()->toArray();

                    if(!empty($result))
                    {
                        //对比密码
                        $store_pwd = Crypt::decrypt($result['0']['pwd']);
                        if($store_pwd == $pwd)
                        {
                            session(['admin' => $name]);
                            return redirect('/backend/index');

                        }else{
                            $data['msg'] = "帐号或者密码错误!";
                            return view('backend.login',['msg' => $data['msg']]);
                        }
                    }else{
                        $data['msg'] = "帐号或者密码错误!";
                        return view('backend.login',['msg' => $data['msg']]);
                    }
                }else{
                    $data['msg'] = "验证码错误!";
                    return view('backend.login',['msg' => $data['msg']]);
                }

            }else{
                $data['msg'] = "帐号或者密码或者验证码都不能为空!";
                return view('backend.login',['msg' => $data['msg']]);
//                $pdo = DB::connection()->getpdo();
//                dd($pdo);
//                $admin = DB::table('admin')->where('a_id',1)->get();
//                dd($admin);
            }
        }else{
            return view('backend.login');
        }



    }

    public function logout(){
        session(['admin' => '']);
        return redirect('/backend/login');
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

