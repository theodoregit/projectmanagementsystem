<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Member
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
        if(!Auth::check()){
            return redirect()->route('login');
        }
        if(Auth::user()->role == 3){
            return redirect()->route('leader/dashboard');
        }
        if(Auth::user()->role == 1){
            return redirect()->route('project/dashboard');
        }
        if(Auth::user()->role == 0){
            return redirect()->route('home');
        }
       
        if (Auth::user()->role == 2) {
            return $next($request);
        }
    }
}
