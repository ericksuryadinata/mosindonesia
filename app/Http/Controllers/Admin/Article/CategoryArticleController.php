<?php

namespace App\Http\Controllers\Admin\Article;

use App\Models\CategoryArticle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryArticleController extends Controller
{
    /**
     * @var CategoryArticle $categoryArticle
     */
    protected $categoryArticle;

    /**
     * CategoryArticleController constructor.
     */
    public function __construct()
    {
        $this->categoryArticle = new CategoryArticle();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['models'] = CategoryArticle::orderBy('id', 'desc')->paginate(10);
        return view('admin.article.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.category.create');
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
            'name' => 'required|max:200',
            'description' => 'required',
        ]);
        if ($this->categoryArticle->create($request->all())) {
            return redirect()->route('admin.category_article.index')->with(['status' => 'success', 'message' => 'Save Successfully']);
        }
        return redirect()->route('admin.category_article.create')->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
    }

    /**
     * Display the specified resource.
     *
     * @param CategoryArticle $category_article
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryArticle $category_article)
    {
        CategoryArticle::where('is_ongoing', 1)->update(['is_ongoing' => 0]);
        $category_article->update(['is_ongoing' => 1]);

        return redirect()->route('admin.category_article.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CategoryArticle  $category_article
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryArticle $category_article)
    {
        return view('admin.article.category.edit', ['model' => $category_article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CategoryArticle  $category_article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryArticle $category_article)
    {
        $request->validate([
            'name' => 'required|max:200',
            'description' => 'required',
        ]);
        if ($category_article->update($request->all())) {
            return redirect()->route('admin.category_article.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
        }
        return redirect()->route('admin.category_article.edit', $category_article->id)->with(['status' => 'danger', 'message' => 'Update Failed, Contact Developer']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CategoryArticle $category_article
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(CategoryArticle $category_article)
    {
        if ($category_article->delete()) {
            return redirect()->route('admin.category_article.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.category_article.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
