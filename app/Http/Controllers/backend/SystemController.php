<?php

namespace App\Http\Controllers\backend;

use App\Model\FriendLink;
use Illuminate\Http\Request;

use App\Http\Requests;

class SystemController extends BackendController
{
    public function friendlink(){

        $friendLinks = FriendLink::orderBy('priority','desc')->get();
        return view('backend.friendlink',['friendlinks'=>$friendLinks]);
    }

    public function friendlinkadd(Request $request){
        if($request->isMethod('post')) {
            $data = array();
            $data['webname'] = request()->input('webname');
            $data['web'] = request()->input('web');
            $data['status'] = request()->input('status');
            $data['priority'] = request()->input('priority');

            $insert_result = FriendLink::create($data);
            if($insert_result->id)
            {
                $ReData['msg'] = "添加成功";
                $ReData['status'] = 1;

            }else{
                $ReData['msg'] = "添加失败,请重新添加!";
                $ReData['status'] = 0;
            }

            echo json_encode($ReData);

        }else{
            return view('backend.friendlinkadd');
        }

    }

    public function friendlinkdel($id){
        $result = FriendLink::destroy($id);
        if($result)
        {
            $ReData['msg'] = "删除成功";
            $ReData['status'] = 1;
        }else{
            $ReData['msg'] = "删除失败";
            $ReData['status'] = 0;

        }
        echo json_encode($ReData);
    }

    public function friendlinkedit(Request $request,$id){
        if($request->isMethod('post')) {
            $data = array();
            $data['webname'] = request()->input('webname');
            $data['web'] = request()->input('web');
            $data['status'] = request()->input('status');
            $data['priority'] = request()->input('priority');

            $result = FriendLink::where('id',$id)->update($data);
            if($result)
            {
                $ReData['msg'] = "修改成功";
                $ReData['status'] = 1;
            }else{
                $ReData['msg'] = "修改失败";
                $ReData['status'] = 0;
            }
            echo json_encode($ReData);

        }else{
            $data = FriendLink::find($id)->toArray();
            return view('backend.friendlinkedit',['data'=> $data]);
        }



    }













}
