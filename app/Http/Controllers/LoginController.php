<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Request;

class LoginController extends Controller {
    // Redirect
    public function redirect () { return redirect()->to('/login'); }

    // Index (GET)
    public function index_1 () {
        if (Auth::check()) {
            return redirect()->to('/home');
        }

        return view('pages.login.index');
    }

    // Index (POST)
    public function index_2 () {
        $credentials = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->to('/home');
        }

        return back()->withErrors(['credentials' => 'Incorrect email or password.']);
    }

    // Logout
    public function logout () {
        Auth::logout();

        return redirect()->to('/login');
    }
}