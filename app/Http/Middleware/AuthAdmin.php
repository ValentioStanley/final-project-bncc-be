<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if(Auth::user()->adminID === 'admin'){
        //     return $next($request);
        // }else{
        //     session()->flush();
        //     return redirect()->route('login');
        // }
        // return $next($request);
        if(!auth()->check()){
            abort(403);
        }else if(!auth()->user()->adminID){
            return redirect(route('user'));
        }
        return $next($request);
    }
}
