<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Auth
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
        
        /*
        session_start();
        $user = Session::get('user');
        if (empty($user)) {
            return redirect('/login');
        } else {
            return $next($request);
        }
        */

        //$next($request);
    }
}
