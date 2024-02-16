<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Request;

class LoginController extends Controller {
    // GET: Redirect
    public function redirect () { return redirect()->to('/login'); }

    // GET: Index
    public function index () {
        if (Auth::check()) {
            return redirect()->to('/users');
        }

        return view('pages.login.index');
    }

    // POST: Login
    public function login () {
        // Validate
        $credentials = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Success
        if (Auth::attempt($credentials)) {
            return redirect('/users');
        }

        // Fail
        return back()->withErrors(['credentials' => 'Incorrect email or password.']);
    }

    // ACTION: Logout
    public function logout () {
        Auth::logout();

        return redirect()->to('/login');
    }
}