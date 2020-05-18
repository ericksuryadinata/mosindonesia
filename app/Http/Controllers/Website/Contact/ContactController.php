<?php

namespace App\Http\Controllers\Website\Contact;

use App\Models\Contact;
use App\Models\Inbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\ReCaptcha;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    /**
     * @var Inbox $inbox
     */
    protected $inbox;

    /**
     * ImageController constructor.
     */
    public function __construct()
    {
        View::share('menu', 'Kontak Kami');
        $this->inbox = new Inbox();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['contact'] = Contact::whereUsed(1)->first();
        $data['allContact'] = Contact::orderBy('id')->get();
        $data['siteKey'] = Config::get('services.recaptcha.site');
        return view('website.contact.index', $data);
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
        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email',
            'phone' => 'required',
            'description' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        if ($this->inbox->create($request->all())) {
            return response()->json(['status' => 'success', 'message' => 'Message Send'], 200);
        }
        return response()->json(['status' => 'danger', 'message' => 'Message Not Send, Contact Administrator'], 401);
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
}
