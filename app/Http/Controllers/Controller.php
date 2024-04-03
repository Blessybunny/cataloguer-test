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
        $auth = Auth::user(); // Auth::user(); // User::find(4)

        if ($auth != null) {
            $auth->is_principal = $auth->DB_ROLE_id == 1 ? true : false;
            $auth->is_administrator = $auth->DB_ROLE_id == 2 ? true : false;
            $auth->is_grade_level_coordinator = $auth->DB_ROLE_id == 3 ? true : false;
            $auth->is_adviser = $auth->DB_ROLE_id == 4 ? true : false;

            if (
                $auth->is_principal ||
                $auth->is_administrator
            ) {
                $auth->ST_subject_fil = true;
                $auth->ST_subject_eng = true;
                $auth->ST_subject_mat = true;
                $auth->ST_subject_sci = true;
                $auth->ST_subject_ap = true;
                $auth->ST_subject_ep = true;
                $auth->ST_subject_tle = true;
                $auth->ST_subject_mapeh = true;
                $auth->ST_subject_jp = true;

                $auth->ST_subject_sf10_acads = true;
                $auth->ST_subject_sf10_grade = true;
            }
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