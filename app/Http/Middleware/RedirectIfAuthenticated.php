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
        if (!$guard) {
            $guard = config('auth.defaults.guard');
        }

        if (Auth::guard($guard)->check()) {
            if ($guard === 'students') {
                return redirect()->route('website.dashboard.index');
            }

            return redirect()->route("{$guard}.dashboard.index");
        }

        return $next($request);
    }
}
