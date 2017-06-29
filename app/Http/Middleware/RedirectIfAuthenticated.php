<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            $url = $guard ? $guard : '/home';
            return redirect($url);
        }
        return $next($request);
        /**
        未登录时候，login经过中间件，
        这时候 Auth::guard($guard)->check()一定是false 因为还没有登录，
        登录认证信息产生在return $next($request) 之后
         */
    }
}
