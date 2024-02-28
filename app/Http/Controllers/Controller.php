<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests, ValidatesRequests;

    // Auth
    public function auth () { return User::find(1); }

    // Redirect
    public function home () { return redirect()->to('/home'); }

    // Home (GET)
    public function land () {
        $auth = self::auth();

        return view('pages.home')
            ->with('auth', $auth);
    }
}
