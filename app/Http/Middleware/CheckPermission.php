<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if($role === 'seeker' && auth()->user()->isSeeker()){
            return $next($request);
        }
        if($role === 'employer' && auth()->user()->isEmployer()){
            return $next($request);
        }
       return redirect(route('home'));
    }
}
