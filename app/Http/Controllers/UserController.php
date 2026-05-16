<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index() {
        return view('/user/cabinet');
    }
    public function changePassUser() {
        return view('/user/changePass');
    }
    public function changePassUserHandle(Request $r) {
        $user = auth()->user();
        $r->validate([
            'old_password'=> 'required',
            'password'=> 'required|confirmed',
        ]);
        if (!Hash::check($r->old_password, $user->password)) {
            return back()->withErrors('Неверный пароль');
        }
        $user['password'] = Hash::make($r->password);
        $user->save();
        return redirect()->route('cabinet');
    }
}


