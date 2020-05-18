<?php

namespace App\Http\Controllers\Website\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{

    /**
     * Blog Constructor
     */
    public function __construct()
    {
        View::share('menu','Blog');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(9);

        return view('website.blog.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function category($category){

        $categoryArticle = CategoryArticle::whereSlug($category)->first();
        View::share('subMenu', $categoryArticle->name);
        $articles = Article::whereCategoryArticleId($categoryArticle->id)->paginate(9);

        return view('website.blog.category', compact('articles', 'categoryArticle'));
    }

    public function single($category, $slug){

        $categoryArticle = CategoryArticle::whereSlug($category)->first();
        $article = Article::whereSlug($slug)->first();

        return [$categoryArticle, $article];
    }
}
