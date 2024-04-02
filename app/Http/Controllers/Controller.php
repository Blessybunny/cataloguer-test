<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests, ValidatesRequests;

    /**
     * REDIRECT
     */
    public function home () { return redirect()->to('/home'); }

    /**
     * AUTH
     */
    public function auth () {
        $auth = User::find(8); // Auth::user(); // User::find(4)

        if ($auth != null) {
            $auth->is_principal = $auth->DB_ROLE_id == 1 ? true : false;
            $auth->is_administrator = $auth->DB_ROLE_id == 2 ? true : false;
            $auth->is_grade_level_coordinator = $auth->DB_ROLE_id == 3 ? true : false;
            $auth->is_adviser = $auth->DB_ROLE_id == 4 ? true : false;
        }

        return $auth;
    }

    /**
     * HOME
     */
    public function land () {
        // Check if user still exists
        $auth = self::auth();

        if ($auth == null) {
            return (new LoginController)->redirect();
        }

        // Proceed
        return view('pages.home')
            ->with('auth', $auth);
    }
}