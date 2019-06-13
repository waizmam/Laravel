<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function login(Request $request){
        $request->validate([
            'email'=> 'required|string',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $authOK = Auth::guard('admin')->attempt($credentials,$request->remember);

        if($authOK){
            //admin.dashboard
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInputs($request->only('email','remember'));
    }

    public function index(){
        return view('auth.admin-login');
    }
}
