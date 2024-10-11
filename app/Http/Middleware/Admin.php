<?php

namespace App\Http\Middleware;

use Closure;
//use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(!Auth::guard('admin')->check()){
           return redirect()->route('admin.login')->with('error', 'Please login first');
        }
        //if (Auth::guard('admins')->check()) {
          //      return redirect()->route('admin.dashboard');
        //}
        return $next($request);
    }
}