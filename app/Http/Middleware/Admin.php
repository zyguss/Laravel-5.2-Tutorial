<?php

// php artisan make:middleware Admin 
// middleware i kernel su povezani

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                return $next($request); // sve je u redu idi na sledecu aplikaciju
            }
        }
        return redirect('/');
        
    }
}
