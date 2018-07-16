<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
{

    public function handle($request, Closure $next)
    {
        //在这里判断session,后台是否有login
        if(!$request->session()->has('admin'))
        {
            return redirect('/backend/login');
        }
        return $next($request);



        return $next($request);
    }
}
