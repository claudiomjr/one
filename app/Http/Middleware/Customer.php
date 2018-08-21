<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Customer
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
       if(Auth::user()->status->name=='Approved'){
            return $next($request);
       }
        elseif (Auth::user()->email=='luisclaudiomjr@gmail.com') {
            return $next($request);
        }
        return redirect('/home');
    }
}