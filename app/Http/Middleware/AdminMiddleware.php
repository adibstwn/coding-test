<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        // admin == 1
        // user == 0
        if (Auth::check()) {
            if (Auth::user()->role == '1') {
                return $next($request);
            } else {
                notify()->warning("you are not allowed to access this endpoint");
                return redirect('/')->with('message', 'Access Denied as you are not admin');
            }
        } else {
            notify()->warning("you must login first");
            return redirect('/')->with('message', 'login to access web info');
        }
        // return $next($request);
    }
}
