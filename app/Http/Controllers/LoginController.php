<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;

use Request;

// Do-not-touch
// Whitespace-checked
// Restriction-checked

class LoginController extends Controller {
    // REDIRECT
    public function redirect () { return redirect()->to('/login'); }

    // INDEX
    public function index_1 () {
        if (Auth::check()) {
            return (new Controller)->home();
        }

        return view('pages.login');
    }
    public function index_2 () {
        $credentials = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return (new Controller)->home();
        }

        return back()->withErrors(['credentials' => 'Incorrect email or password.']);
    }

    // FUNCTION: logout
    public function logout () {
        Auth::logout();

        return self::redirect();
    }
}