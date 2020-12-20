<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStatus
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

        if(Auth::check() && Auth::user()->status != '1'){
            Auth::logout();
            //dd("return back to login");
            return redirect('/login')->with('inactive', 'inactive account');
        }
        
        return $next($request);
    }
}
