<?php

namespace App\Http\Controllers\Admin\Article;

use App\Models\Article;
use App\Models\CategoryArticle;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * @var Article $article
     */
    protected $article;

    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->article = new Article();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['models'] = Article::orderBy('id', 'desc')->paginate(10);
        return view('admin.article.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = CategoryArticle::all();
        return view('admin.article.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'category_article_id' => 'required|exists:category_articles,id',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('article');
        if ($this->article->create($request->only('category_article_id', 'title', 'description', 'sub_category_id') + ['image' => $path])) {
            return redirect()->route('admin.article.index')->with(['status' => 'success', 'message' => 'Save Successfully']);
        }
        return redirect()->route('admin.article.create')->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
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
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $data['categories'] = CategoryArticle::all();
        $data['subCategories'] = SubCategory::where('category_article_id', $article->category_article_id)->get();
        $data['model'] = $article;
        return view('admin.article.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|max:200',
            'category_article_id' => 'required|exists:category_articles,id',
            'description' => 'required',
            'image' => 'image'
        ]);

        if ($request->hasFile('image')) {

            if (Storage::exists($article->image)) {
                Storage::delete($article->image);
            }

            $path = $request->file('image')->store('article');
            $update = $article->update($request->only('category_article_id', 'title', 'description', 'sub_category_id') + ['image' => $path]);
        } else {
            $update = $article->update($request->only('category_article_id', 'title', 'description', 'sub_category_id'));
        }

        if ($update) {
            return redirect()->route('admin.article.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
        }

        return redirect()->route('admin.article.edit', $article->id)->with(['status' => 'danger', 'message' => 'Update Failed, Contact Developer']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        if (Storage::exists($article->image)) {
            Storage::delete($article->image);
        }

        if ($article->delete()) {
            return redirect()->route('admin.article.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.article.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
