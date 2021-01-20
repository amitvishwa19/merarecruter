<?php

namespace App\Http\Middleware;

use Closure;

class Candidate
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
        if(Auth::user()->type != 'candidate'){
            return redirect()->route('app.recruiter.dashboard')->with('message', 'not register as a recruter');
        }
        return $next($request);
    }
}
