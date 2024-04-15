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
        $auth = Auth::user();

        if ($auth != null) {
            $auth->is_principal = $auth->DB_ROLE_id == 1 ? true : false;
            $auth->is_administrator = $auth->DB_ROLE_id == 2 ? true : false;
            $auth->is_grade_level_coordinator = $auth->DB_ROLE_id == 3 ? true : false;
            $auth->is_adviser = $auth->DB_ROLE_id == 4 ? true : false;

            if ($auth->is_administrator) {
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
        // Guard
        $auth = self::auth();

        if ($auth == null) {
            return (new LoginController)->redirect();
        }

        // Proceed (borrowed code: see YearController.php)
        $year = (new YearController)->Format_Year(Year::orderBy('year', 'DESC')->first());
        $grades = Grade::all();
        $students = Student::orderBy('info_name_last', 'ASC')
            ->where('DB_YEAR_id_g7', $year->id)
            ->orWhere('DB_YEAR_id_g8', $year->id)
            ->orWhere('DB_YEAR_id_g9', $year->id)
            ->orWhere('DB_YEAR_id_g10', $year->id)
            ->get();

        foreach ($students as $student) {
            do {
                foreach ($grades as $grade) {
                    if ($student->{'DB_YEAR_id_g'.$grade->grade} == $year->id) {
                        $student->section = Section::find($student->{'DB_SECTION_id_g'.$grade->grade});

                        if ($student->section != null) {
                            $student->grade = Grade::find($student->section->DB_GRADE_id)->grade;
                            $student->user = User::find($student->section->DB_USER_id);
                            $student->section = $student->section->section;
                        }

                        break;
                    }
                }
            }
            while (false);
        }

        // Proceed
        return view('pages.home')
            ->with('auth', $auth)
            ->with('students', $students)
            ->with('year', $year);
    }
}