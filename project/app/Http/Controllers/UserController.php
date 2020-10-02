<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function dashboard() {
        return view('dashboard');
    }

    public function allusers() {
        $users = User::all();
        return view('allusers',['users'=>$users]);
    }

    public function show ($user_id) {
        $user_data = User::findOrFail($user_id);
        return view('show',["user"=>$user_data]);
    }
}