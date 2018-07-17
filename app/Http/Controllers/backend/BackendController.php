<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    public $pageNum = '10';
    public $author_cover_path = "";
    public $novel_cover_path = "";

    public function __construct()
    {
        date_default_timezone_set('Asia/Shanghai');
        $this->author_cover_path = "public/uploads/author/" . date('Ymd',time()).'/';
        $this->novel_cover_path = "public/uploads/novel/" . date('Ymd',time()).'/';
    }

    //删除指定session数据
    public function deleteSession($request, $key){
        return $request->session()->forget($key);
    }

    //删除所有session数据
    public function deleteAllSession($request){
        return $request->session()->flush();
    }


    //上传图片
    public function uploadphoto(Request $request,$imageType){
        $file = $request->file('photo');//获取图片
        if(!empty($file))
        {
            $allowed_extensions = ["png", "jpg", "gif"];
            if ($file->getClientOriginalExtension() && !in_array(strtolower($file->getClientOriginalExtension()), $allowed_extensions)) {
                return Response()->json([
                    'status' => 0,
                    'msg' => '只能上传 png | jpg | gif格式的图片'
                ]);
            }
            if($imageType == 1)
            {
                $destinationPath =  $this->author_cover_path;
            }else{
                $destinationPath =  $this->novel_cover_path;
            }

            $extension = $file->getClientOriginalExtension();
            $fileName = time().str_random(5).'.'.$extension;
            $file->move($destinationPath, $fileName);
            return Response()->json(
                [
                    'status' => 1,
                    //'pic' => asset($destinationPath.$fileName),
                    'pic' => "/".$destinationPath.$fileName,
                    'msg' => '上传成功！'
                ]
            );
        }

    }





}
