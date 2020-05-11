<?php

namespace App\Http\Controllers\Admin\Banner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * @var Banner $banner
     */
    protected $banner;

    /**
     * BannerController constructor.
     */
    public function __construct()
    {
        $this->banner = new Banner();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['models'] = Banner::orderBy('id', 'desc')->paginate(10);
        return view('admin.banner.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('banner');
        if ($this->banner->create($request->only('title', 'description') + ['url' => $path])) {
            return redirect()->route('admin.banner.index')->with(['status' => 'success', 'message' => 'Save Successfully']);
        }
        return redirect()->route('admin.banner.create')->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
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
     * @param  Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', ['model' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required',
            'image' => 'image'
        ]);

        if ($request->hasFile('image')) {

            if (Storage::exists($banner->url)) {
                Storage::delete($banner->url);
            }

            $path = $request->file('image')->store('banner');
            $update = $banner->update($request->only('title', 'description') + ['url' => $path]);
        } else {
            $update = $banner->update($request->only('title', 'description'));
        }

        if ($update) {
            return redirect()->route('admin.banner.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
        }

        return redirect()->route('admin.banner.edit', $banner->id)->with(['status' => 'danger', 'message' => 'Update Failed, Contact Developer']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Banner $banner
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Banner $banner)
    {
        if (Storage::exists($banner->url)) {
            Storage::delete($banner->url);
        }

        if ($banner->delete()) {
            return redirect()->route('admin.banner.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.banner.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }

    public function activate(Banner $banner)
    {
        $this->banner->where('active', 1)->update(['active' => 0]);
        $update = $banner->update(['active' => 1]);
        if ($update) {
            return redirect()->route('admin.banner.index')->with(['status' => 'success', 'message' => 'Activation Successfully']);
        }
        return redirect()->route('admin.banner.index')->with(['status' => 'danger', 'message' => 'Activation Failed, Contact Developer']);
    }
}
