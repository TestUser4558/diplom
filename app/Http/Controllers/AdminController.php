<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function users() {
        $data["users"] = User::all()->where('role_id',">",1);
        return view('/admin/users/users', $data);
    }
    public function addUser() {
        $data["roles"] = Role::all()->where('id',">",1);
        return view('/admin/users/create', $data);
    }
    public function addUserHandle(Request $r) {
        $user = new User();
        $user['fio'] = $r->fio;
        $user['login'] = $r->login;
        $user['phone'] = $r->phone;
        $user['role_id'] = $r->role_id;
        $user['password'] = Hash::make($r->password);
        $user->save();
        return redirect()->route('users');
    }
    public function updateUser(User $user) {
        $data['user'] = $user;
        $data["roles"] = Role::all()->where('id',">",1);
        return view('/admin/users/update', $data);
    }
    public function updateUserHandle(Request $r,User $user) {
        $user['fio'] = $r->fio;
        $user['login'] = $r->login;
        $user['phone'] = $r->phone;
        $user['role_id'] = $r->role_id;
        $user->save();
        return redirect()->route('users');
    }
    public function changePassUser(User $user) {
        $data['user'] =$user;
        return view('/admin/users/changePass', $data);
    }
    public function changePassUserHandle(Request $r,User $user) {
        $user['password'] = Hash::make($r->password);
        $user->save();
        return redirect()->route('users');
    }
    public function delUser(User $user) {
        $user->delete();
        return redirect()->route('users');
    }
}


