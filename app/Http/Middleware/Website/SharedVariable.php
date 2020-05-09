<?php

namespace App\Http\Middleware\Website;

use App\Models\CategoryArticle;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\SocialMedia;
use Closure;
use Illuminate\Support\Facades\View;

class SharedVariable
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
        $data['categoryArticles'] = CategoryArticle::all();
        $data['contact'] = Contact::find(1);
        $data['setting'] = Setting::find(1);
        $data['meta'] = $data['setting'];
        $data['socialMedia'] = SocialMedia::all();
        View::share($data);
        return $next($request);
    }
}
