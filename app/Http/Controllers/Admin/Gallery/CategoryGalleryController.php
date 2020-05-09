<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Models\CategoryGallery;
use App\Models\Gallery;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CategoryGalleryController extends Controller
{
    /**
     * @var CategoryGallery $categoryGallery
     */
    protected $categoryGallery;

    /**
     * VideoController constructor.
     */
    public function __construct()
    {
        $this->categoryGallery = new CategoryGallery();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['models'] = CategoryGallery::latest()->paginate(10);
        return view('admin.gallery.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.gallery.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'description' => 'required'
        ]);

        if ($this->categoryGallery->create($request->all())) {
            return redirect()->route('admin.category_gallery.index')->with(['status' => 'success', 'message' => 'Save Successfully']);
        }
        return redirect()->route('admin.category_gallery.create')->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CategoryGallery  $category_gallery
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(CategoryGallery $category_gallery)
    {
        return view('admin.gallery.category.edit', ['model' => $category_gallery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  CategoryGallery  $category_gallery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CategoryGallery $category_gallery)
    {
        $request->validate([
            'name' => 'required|max:200',
            'description' => 'required'
        ]);

        if ($category_gallery->update($request->all())) {
            return redirect()->route('admin.category_gallery.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
        }
        return redirect()->route('admin.category_gallery.edit', $category_gallery->id)->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CategoryGallery $category_gallery
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(CategoryGallery $category_gallery)
    {
        $category_gallery->galleries()->update(['category_gallery_id' => null]);
        if ($category_gallery->delete()) {
            return redirect()->route('admin.category_gallery.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.category_gallery.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
