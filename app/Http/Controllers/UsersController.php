<?php

namespace App\Http\Controllers;
use \App\User;
use \App\Http\Requests\Users\UpdateUserRequest;

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
    public function profile() {
        return view('profile.profile')->with('user', auth()->user());
    }
    public function update(UpdateUserRequest $request) {
        auth()->user()->update([
            'name' => $request->name,
            'about' => $request->about,
        ]);

        return redirect()->back();
    }
}
