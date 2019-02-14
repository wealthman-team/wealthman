<?php

namespace App\Http\Middleware;

use Auth;
use Closure;


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
            if ($request->is('admin') || $request->is('admin/*')) {
                return redirect(route('admin.index'));
            }

            return redirect(route('home'));
        }

        return $next($request);
    }
}
