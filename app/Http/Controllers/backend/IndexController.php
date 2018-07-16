<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Model\Admin;
use App\Http\Requests;
use Crypt;

class IndexController extends BackendController
{
    public function welcome(){
        return view('backend.welcome');

    }

    public function index(){
        return view('backend.index');

    }

    public function changeAdminPassword(Request $request){
        if($request->isMethod('post')){
            $newpwd = request()->input('newpwd');

            if(empty($newpwd))
            {
                $data['msg'] = "新密码不能为空";
                echo json_encode($data);
                eixt;
            }
            if(strlen($newpwd)< 6 and strlen($newpwd)>20)
            {
                $data['msg'] = "请输入字母、数字组成的6-20位的密码";
                echo json_encode($data);
                exit;
            }

            $newPassword= Crypt::encrypt($newpwd);

            $result = Admin::where('a_id',session('admin_id'))->update(['pwd'=>$newPassword]);

            if($result)
            {
                $data['msg'] = "修改成功";
            }else{
                $data['msg'] = "修改失败";
            }
            echo json_encode($data);

        }

    }

}
