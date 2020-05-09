<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    /**
     * Login process
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
            'username' => 'required',
            'password' => 'required|min:5'
            ]
        );

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $remember = $request->remember;

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect()->intended(route('admin.dashboard.index'));
        }

        return redirect()->back()->withInput($request->only('username'));
    }

    /**
     * Logout process
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }
}
