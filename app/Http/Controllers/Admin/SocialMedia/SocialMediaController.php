<?php

namespace App\Http\Controllers\Admin\SocialMedia;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class SocialMediaController extends Controller
{
    /**
     * @var SocialMedia $socialMedia
     */
    protected $socialMedia;

    /**
     * SocialMediaController constructor.
     */
    public function __construct()
    {
        $this->socialMedia = new SocialMedia();
        $data['types'] = ['facebook', 'instagram', 'google', 'twitter', 'linkedin'];
        View::share($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['models'] = SocialMedia::latest()->paginate(10);
        return view('admin.social_media.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social_media.create');
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
            'type' => 'required',
            'url' => 'required|active_url'
        ]);

        if ($this->socialMedia->create($request->all())) {
            return redirect()->route('admin.social_media.index')->with(['status' => 'success', 'message' => 'Save Successfully']);
        }
        return redirect()->route('admin.social_media.create')->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
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
     * @param SocialMedia $social_media
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $social_media)
    {
        return view('admin.social_media.edit', ['model' => $social_media]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param SocialMedia $social_media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialMedia $social_media)
    {
        $request->validate([
            'name' => 'required|max:200',
            'type' => 'required',
            'url' => 'required|active_url'
        ]);

        if ($social_media->update($request->all())) {
            return redirect()->route('admin.social_media.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
        }
        return redirect()->route('admin.social_media.edit', $social_media->id)->with(['status' => 'danger', 'message' => 'Update Failed, Contact Developer']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SocialMedia $social_media
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(SocialMedia $social_media)
    {
        if ($social_media->delete()) {
            return redirect()->route('admin.social_media.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.social_media.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
