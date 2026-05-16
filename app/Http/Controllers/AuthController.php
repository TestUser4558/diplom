<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login() {
        return view('/auth/login');
    }
    public function loginHandle(Request $r) {
        if (Auth::attempt(["login"=>$r->login,"password"=>$r->password ])){
            return redirect("/eqips");
        }
        return back();

    }
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
