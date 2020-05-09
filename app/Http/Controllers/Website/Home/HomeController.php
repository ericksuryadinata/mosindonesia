<?php

namespace App\Http\Controllers\Website\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        View::share('menu', 'Home');
    }

    public function index()
    {
        $data['sliders']        = Slider::all();
        $data['article']        = Article::inRandomOrder()->take(3)->get();
        $data['galleries']      = Gallery::image()->inRandomOrder()->take(8)->get();
        $data['services']      = Service::latest()->take(4)->get();

        return view('website.home.index', $data);
    }
}
