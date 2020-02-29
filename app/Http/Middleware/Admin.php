<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check() && $request->auth()->guard('admin')->user()->level == 'admin' ){
            return $next($request);
        }elseif (auth()->check() && $request->auth()->guard('admin')->user()->level == 'petugas') {
            return $next($request);
        }
        return redirect()->back();

    }
}
