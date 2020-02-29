<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 

class checkLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$levels)
    {
        $levels = explode('|',$levels);
        foreach($levels as $level){
            if($level == 'petugas' && auth()->guard('admin')->user()->level == 'petugas'){
                return $next($request);
            }
            if ($level == 'admin' && auth()->guard('admin')->user()->level == 'admin') {
                return $next($request);
            }
            if($level == 'masyarakat' && auth()->user()){
                return $next($request);
            }
        }
        return redirect()->back();
    }
}
