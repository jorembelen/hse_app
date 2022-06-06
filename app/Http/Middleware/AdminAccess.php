<?php

namespace App\Http\Middleware;

use RealRashid\SweetAlert\Facades\Alert;
use Closure;
use Auth;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(auth()->check() && auth()->user()->role == 'admin' || auth()->user()->role == 'super_admin'
        || auth()->user()->role == 'gm' || auth()->user()->role == 'hsem' || auth()->user()->role == 'member' || auth()->user()->role == 'hse-member') {
            
        return $next($request); 
    }

    Alert::error('Error', 'You are not allowed to access this page');

    return redirect(route('dashboard'));

    }

}
