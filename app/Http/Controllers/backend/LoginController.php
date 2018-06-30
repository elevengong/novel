<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
class LoginController extends Controller
{
    public function login(){

        return View('backend.login');
    }

    public function logout(){
        echo "logout";
    }










}

