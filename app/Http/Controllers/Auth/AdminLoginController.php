<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout', 'getLogout']]);
    }
    public function adminLoginForm()
    {
        return view('admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

//        Get credentials
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

//        Attempt to login user
        if (Auth::guard('admin')->attempt($credentials, $request->remember)){
            return redirect()->intended(route('dashboard'));
        }
//        if unsuccessful redirect
        return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login.admin');
    }


}
