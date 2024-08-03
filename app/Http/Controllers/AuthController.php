<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function loginView()
    {
        return view('login');
    }
    public function login(LoginRequest $request)
    {
        $authType=filter_var($request->user_data, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        if(Auth::attempt([$authType=>$request->user_data,'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }else{
            return back()->withErrors(__('auth.failed'));
        }
    }
}
