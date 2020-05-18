<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WebSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['model'] = Setting::find(1);
        return view('admin.web_setting.index', $data);
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
     * @param  \Illuminate\Http\Request $request
     * @param Setting $web_setting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Setting $web_setting)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'keyword' => 'required',
            'short_description' => 'required|max:200',
            'description' => 'required',
            'icon' => 'image',
            'logo' => 'image',
            'logo_grayscale' => 'image',
            'bg_banner' => 'image'
        ]);

        $upload = [
            'icon' => $web_setting->icon,
            'logo' => $web_setting->logo,
            'logo_grayscale' => $web_setting->logo_grayscale,
            'bg_banner' => $web_setting->bg_banner
        ];

        if ($request->hasFile('icon')) {

            if (Storage::exists($web_setting->icon)) {
                Storage::delete($web_setting->icon);
            }

            $path = $request->file('icon')->store('setting');
            $upload['icon'] = $path;
        }

        if ($request->hasFile('logo')) {

            if (Storage::exists($web_setting->logo)) {
                Storage::delete($web_setting->logo);
            }

            $path = $request->file('logo')->store('setting');
            $upload['logo'] = $path;
        }

        if ($request->hasFile('logo_grayscale')) {

            if (Storage::exists($web_setting->logo_grayscale)) {
                Storage::delete($web_setting->logo_grayscale);
            }

            $path = $request->file('logo_grayscale')->store('setting');
            $upload['logo_grayscale'] = $path;
        }

        if ($request->hasFile('bg_banner')) {

            if (Storage::exists($web_setting->bg_banner)) {
                Storage::delete($web_setting->bg_banner);
            }

            $path = $request->file('bg_banner')->store('setting');
            $upload['bg_banner'] = $path;
        }

        $save = $web_setting->update($request->only('title', 'author', 'short_description','description') + $upload);

        if ($save) {
            return redirect()->route('admin.web_setting.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
        } else {
            return redirect()->route('admin.web_setting.index')->with(['status' => 'danger', 'message' => 'Update Failed, Contact Developer']);
        }
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
}
