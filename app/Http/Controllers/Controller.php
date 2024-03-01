<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests, ValidatesRequests;

    // Auth
    public function auth () { return User::first(); } //find(1)

    // Redirect
    public function home () { return redirect()->to('/home'); }

    // Home (GET)
    public function land () {
        $auth = self::auth();

        //
        if ($auth == null) dd("This user does not exist enymore (auth logout then put login redirection here)");

        return view('pages.home')
            ->with('auth', $auth);
    }
}


/*
// Get the user
$user = Auth::user();

// Log the user out
Auth::logout();

// Delete the user (note that softDeleteUser() should return a boolean for below)
$deleted = $this->userManipulator->softDeleteUser($user);

if ($deleted) {
    // User was deleted successfully, redirect to login
    return redirect(url('login'));
} else {
    // User was NOT deleted successfully, so log them back into your application! Could also use: Auth::loginUsingId($user->id);
    Auth::login($user);

    // Redirect them back with some data letting them know it failed (or handle however you need depending on your setup)
    return back()->with('status', 'Failed to delete your profile');
}
*/