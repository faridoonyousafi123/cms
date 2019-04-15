<?php

namespace App\Http\Controllers;
use \App\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        return view('admin.users.users')->with('users', User::all());
    }
    public function makeAdmin(User $user) {
        $user->role = 'admin';
        $user->save();
        return redirect()->route('users.index');
    }
}
