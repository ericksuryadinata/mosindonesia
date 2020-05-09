<?php

namespace App\Http\Middleware\Admin;

use App\Models\Setting;
use Closure;
use Illuminate\Support\Facades\View;

class GlobalVariable
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
        $data['setting'] = Setting::find(1);
        View::share($data);
        return $next($request);
    }
}
