<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    /**
     * @var Contact $contact
     */
    protected $contact;

    /**
     * ContactController constructor.
     */
    public function __construct()
    {
        $this->contact = new Contact();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['models'] = Contact::orderBy('used', 'desc')->paginate(10);
        return view('admin.contact.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'g_map' => 'required'
        ]);

        if ($this->contact->create($request->all())) {
            return redirect()->route('admin.contact.index')->with(['status' => 'success', 'message' => 'Save Successfully']);
        }
        return redirect()->route('admin.contact.index')->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
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
    public function edit(Contact $contact)
    {
        return view('admin.contact.edit', ['model' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'g_map' => 'required'
        ]);

        if ($contact->update($request->all())) {
            return redirect()->route('admin.contact.index')->with(['status' => 'success', 'message' => 'Save Successfully']);
        }
        return redirect()->route('admin.contact.index')->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        if ($contact->delete()) {
            return redirect()->route('admin.contact.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.contact.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }

    public function use(Contact $contact)
    {
        Contact::where('used', 1)->update(['used' => 0]);

        $update = $contact->update(['used' => 1]);
        if ($update) {
            return redirect()->route('admin.contact.index')->with(['status' => 'success', 'message' => 'Contact Used']);
        }

        return redirect()->route('admin.contact.index')->with(['status' => 'danger', 'message' => 'Used Contact Failed, Contact Developer']);
    }
}
