<?php

namespace App\Http\Controllers\Admin\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['service'] = Service::orderBy('id', 'desc')->paginate(10);
        return view('admin.service.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'title'         => 'required|max:200',
            'description'   => 'required',
            'icon'          => 'required'
        ]);

        $service = Service::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'icon'          => $request->icon
        ]);

        if ($service) {
            return redirect()->route('admin.service.index')->with(['status' => 'success', 'message' => 'Save Successfully']);
        }
        return redirect()->route('admin.service.create')->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
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
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {

        $request->validate([
            'title'         => 'required|max:200',
            'description'   => 'required',
            'icon'          => 'required'
        ]);

        if ($service->update($request->all())) {
            return redirect()->route('admin.service.index')->with(['status' => 'success', 'message' => 'Service updated successfully']);
        }

        return redirect()->route('admin.service.index')->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if($service->delete()){
            return redirect()->route('admin.service.index')->with(['status' => 'success', 'message' => 'Service deleted successfully']);
        }

        return redirect()->route('admin.service.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
