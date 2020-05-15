<?php

namespace App\Http\Controllers\Website\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Banner;
use App\Models\Contact;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        View::share('menu', 'Home');
    }

    public function index()
    {
        $data['banner'] = Banner::where('active', 1)->first();
        $article = Article::where('headline', 1)->get();
        $allArticle = Article::latest()->take(6)->get();
        $mergedArticle = $article->merge($allArticle);
        $data['articles'] = $mergedArticle->all();
        $data['services'] = Service::where('active',1)->get();
        $data['contacts'] = Contact::all();

        return view('website.home.index', $data);
    }
}
