<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use Crypt;
use App\Model\Admin;
use Illuminate\Http\Response;

//require_once 'resources/org/code/svcode.php';
class LoginController extends BackendController
{
    public function login(Request $request){
        if($request->isMethod('post'))
        {
            $name = request()->input('name');
            $pwd = request()->input('pwd');
            $code = request()->input('code');
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
                            session(['admin' => $name, 'admin_id' => $result[0]['a_id']]);
                            $reData['status'] = 1;
                            $reData['msg'] = "登陆成功!";

                        }else{
                            $reData['status'] = 0;
                            $reData['msg'] = "帐号或者密码错误!";
                        }
                    }else{
                        $reData['status'] = 0;
                        $reData['msg'] = "帐号或者密码错误!";
                    }
                }else{
                    $reData['status'] = 0;
                    $reData['msg'] = "验证码错误!";
                }

            }else{
                $reData['status'] = 0;
                $reData['msg'] = "帐号或者密码或者验证码都不能为空!";
            }
            //print_r($reData);exit;

            echo json_encode($reData);

        }else{
            return view('backend.login');
        }
    }

    public function logout(Request $request){
        $this->deleteAllSession($request);
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

