<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Year;

use Request;

class YearController extends Controller {
    /**
     * GUARD
     * Accessible by principals and administrators
     */
    public function guard ($auth) {
        if (
            $auth != null &&
            (
                $auth->is_principal ||
                $auth->is_administrator
            )
        ) {
            return false;
        }
        else {
            return true;
        }
    }

    /**
     * INDEX
     */
    public function index () {
        // Guard
        $auth = (new Controller)->auth();

        if (self::guard($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $terms = Request::get('terms');
        $search = explode(' ', $terms);
        $years = Year::query();

        foreach ($search as $term) {
            $years->where(function ($q) use ($term) {
                $q->where('full', 'like', '%'.$term.'%');
            });
        }

        $years = self::Format_Years($years);

        return view('pages.years.index')
            ->with('auth', $auth)
            ->with('terms', $terms)
            ->with('years', $years);
    }

    /**
     * VIEW
     */
    public function view ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $year = Year::find($id);

        if (
            self::guard($auth) ||
            $year == null
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $year = self::Format_Year($year);
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
                            $student->is_archived = false;
                            $student->grade = Grade::find($student->section->DB_GRADE_id)->grade;
                            $student->user = User::find($student->section->DB_USER_id);
                            $student->section = $student->section->section;
                        }
                        else if ($student->LG_SECTION_name_g7 != null) {
                            $student->is_archived = true;
                            $student->grade = '7';
                            $student->user = new User();
                            $student->user->name_last = $student->LG_USER_name_last_g7;
                            $student->user->name_first = $student->LG_USER_name_first_g7;
                            $student->section = $student->LG_SECTION_name_g7.' (Archived)';
                        }
                        else if ($student->LG_SECTION_name_g8 != null) {
                            $student->is_archived = true;
                            $student->grade = '8';
                            $student->user = new User();
                            $student->user->name_last = $student->LG_USER_name_last_g8;
                            $student->user->name_first = $student->LG_USER_name_first_g8;
                            $student->section = $student->LG_SECTION_name_g8.' (Archived)';
                        }
                        else if ($student->LG_SECTION_name_g9 != null) {
                            $student->is_archived = true;
                            $student->grade = '9';
                            $student->user = new User();
                            $student->user->name_last = $student->LG_USER_name_last_g9;
                            $student->user->name_first = $student->LG_USER_name_first_g9;
                            $student->section = $student->LG_SECTION_name_g9.' (Archived)';
                        }
                        else if ($student->LG_SECTION_name_g10 != null) {
                            $student->is_archived = true;
                            $student->grade = '10';
                            $student->user = new User();
                            $student->user->name_last = $student->LG_USER_name_last_g10;
                            $student->user->name_first = $student->LG_USER_name_first_g10;
                            $student->section = $student->LG_SECTION_name_g10.' (Archived)';
                        }

                        break;
                    }
                }
            }
            while (false);
        }

        return view('pages.years.view')
            ->with('auth', $auth)
            ->with('students', $students)
            ->with('year', $year);
    }

    /**
     * CREATE
     */
    public function create_1 () {
        // Guard
        $auth = (new Controller)->auth();

        if (
            self::guard($auth) ||
            $auth->is_principal
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $users = User::where('DB_ROLE_id', '1')->get();

        return view('pages.years.create')
            ->with('auth', $auth)
            ->with('users', $users);
    }
    public function create_2 () {
        // Guard
        $auth = (new Controller)->auth();

        if (
            self::guard($auth) ||
            $auth->is_principal
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $validated = request()->validate([
            'DB_USER_id' => 'nullable',
            'LG_USER_name_last' => 'nullable',
            'LG_USER_name_first' => 'nullable',

            'year' => 'required|unique:years,year',

            'attendance_jan_t' => 'nullable',
            'attendance_feb_t' => 'nullable',
            'attendance_mar_t' => 'nullable',
            'attendance_apr_t' => 'nullable',
            'attendance_may_t' => 'nullable',
            'attendance_jun_t' => 'nullable',
            'attendance_jul_t' => 'nullable',
            'attendance_aug_t' => 'nullable',
            'attendance_sep_t' => 'nullable',
            'attendance_oct_t' => 'nullable',
            'attendance_nov_t' => 'nullable',
            'attendance_dec_t' => 'nullable',
        ]);

        $year = Year::create([
            'DB_USER_id' => $validated['DB_USER_id'],
            'LG_USER_name_last' =>  $validated['DB_USER_id'] == null ? $validated['LG_USER_name_last'] : null,
            'LG_USER_name_first' => $validated['DB_USER_id'] == null ? $validated['LG_USER_name_first'] : null,

            'year' => $validated['year'],
            'full' => $validated['year'].'-'.$validated['year'] + 1,

            'attendance_jan_t' => $validated['attendance_jan_t'],
            'attendance_feb_t' => $validated['attendance_feb_t'],
            'attendance_mar_t' => $validated['attendance_mar_t'],
            'attendance_apr_t' => $validated['attendance_apr_t'],
            'attendance_may_t' => $validated['attendance_may_t'],
            'attendance_jun_t' => $validated['attendance_jun_t'],
            'attendance_jul_t' => $validated['attendance_jul_t'],
            'attendance_aug_t' => $validated['attendance_aug_t'],
            'attendance_sep_t' => $validated['attendance_sep_t'],
            'attendance_oct_t' => $validated['attendance_oct_t'],
            'attendance_nov_t' => $validated['attendance_nov_t'],
            'attendance_dec_t' => $validated['attendance_dec_t'],
        ]);

        return redirect()->to('/years/edit/'.$year->id)
            ->with('created', true);
    }

    /**
     * EDIT
     */
    public function edit_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $year = Year::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $year == null
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $users = User::where('DB_ROLE_id', '1')->get();

        return view('pages.years.edit')
            ->with('auth', $auth)
            ->with('users', $users)
            ->with('year', $year);
    }
    public function edit_2 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $year = Year::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $year == null
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $validated = request()->validate([
            'DB_USER_id' => 'nullable',
            'LG_USER_name_last' => 'nullable',
            'LG_USER_name_first' => 'nullable',

            'attendance_jan_t' => 'nullable',
            'attendance_feb_t' => 'nullable',
            'attendance_mar_t' => 'nullable',
            'attendance_apr_t' => 'nullable',
            'attendance_may_t' => 'nullable',
            'attendance_jun_t' => 'nullable',
            'attendance_jul_t' => 'nullable',
            'attendance_aug_t' => 'nullable',
            'attendance_sep_t' => 'nullable',
            'attendance_oct_t' => 'nullable',
            'attendance_nov_t' => 'nullable',
            'attendance_dec_t' => 'nullable',
        ]);

        $year->update([
            'DB_USER_id' => $validated['DB_USER_id'],
            'LG_USER_name_last' => $validated['DB_USER_id'] == null ? $validated['LG_USER_name_last'] : null,
            'LG_USER_name_first' => $validated['DB_USER_id'] == null ? $validated['LG_USER_name_first'] : null,

            'attendance_jan_t' => $validated['attendance_jan_t'],
            'attendance_feb_t' => $validated['attendance_feb_t'],
            'attendance_mar_t' => $validated['attendance_mar_t'],
            'attendance_apr_t' => $validated['attendance_apr_t'],
            'attendance_may_t' => $validated['attendance_may_t'],
            'attendance_jun_t' => $validated['attendance_jun_t'],
            'attendance_jul_t' => $validated['attendance_jul_t'],
            'attendance_aug_t' => $validated['attendance_aug_t'],
            'attendance_sep_t' => $validated['attendance_sep_t'],
            'attendance_oct_t' => $validated['attendance_oct_t'],
            'attendance_nov_t' => $validated['attendance_nov_t'],
            'attendance_dec_t' => $validated['attendance_dec_t'],
        ]);

        $year->touch();

        return redirect()->to('/years/edit/'.$id)
            ->with('updated', true);
    }

    // ----------------------------------------------------------------------------------------------------

    /**
     * FUNCTION: format year (one)
     */
    public function Format_Year ($year) {
        // Principal
        $user = User::find($year->DB_USER_id);

        if (
            $user != null &&
            $year->LG_USER_name_last == null &&
            $year->LG_USER_name_first == null
        ) {
            $year->user_id = $user->id;
            $year->user_name_last = $user->name_last;
            $year->user_name_first = $user->name_first;
        }
        else if (
            $user == null &&
            $year->LG_USER_name_last != null &&
            $year->LG_USER_name_first != null
        ) {
            $year->user_archived = true;
            $year->user_name_last = $year->LG_USER_name_last;
            $year->user_name_first = $year->LG_USER_name_first;
        }

        // Enrollee Count
        $year->enrollee_count_g7 = Student::where('DB_YEAR_id_g7', $year->id)
            ->whereNotNull('DB_SECTION_id_g7')
            ->get()
            ->count();
        $year->enrollee_count_g8 = Student::where('DB_YEAR_id_g8', $year->id)
            ->whereNotNull('DB_SECTION_id_g8')
            ->get()
            ->count();
        $year->enrollee_count_g9 = Student::where('DB_YEAR_id_g9', $year->id)
            ->whereNotNull('DB_SECTION_id_g9')
            ->get()
            ->count();
        $year->enrollee_count_g10 = Student::where('DB_YEAR_id_g10', $year->id)
            ->whereNotNull('DB_SECTION_id_g10')
            ->get()
            ->count();

        $year->un_enrollee_count_g7 = Student::where('DB_YEAR_id_g7', $year->id)
            ->whereNull('DB_SECTION_id_g7')
            ->get()
            ->count();
        $year->un_enrollee_count_g8 = Student::where('DB_YEAR_id_g8', $year->id)
            ->whereNull('DB_SECTION_id_g8')
            ->get()
            ->count();
        $year->un_enrollee_count_g9 = Student::where('DB_YEAR_id_g9', $year->id)
            ->whereNull('DB_SECTION_id_g9')
            ->get()
            ->count();
        $year->un_enrollee_count_g10 = Student::where('DB_YEAR_id_g10', $year->id)
            ->whereNull('DB_SECTION_id_g10')
            ->get()
            ->count();

        $year->lg_enrollee_count_g7 = Student::where('DB_YEAR_id_g7', $year->id)
            ->whereNull('DB_SECTION_id_g7')
            ->whereNotNull('LG_SECTION_name_g7')
            ->get()
            ->count();
        $year->lg_enrollee_count_g8 = Student::where('DB_YEAR_id_g8', $year->id)
            ->whereNull('DB_SECTION_id_g8')
            ->whereNotNull('LG_SECTION_name_g8')
            ->get()
            ->count();
        $year->lg_enrollee_count_g9 = Student::where('DB_YEAR_id_g9', $year->id)
            ->whereNull('DB_SECTION_id_g9')
            ->whereNotNull('LG_SECTION_name_g9')
            ->get()
            ->count();
        $year->lg_enrollee_count_g10 = Student::where('DB_YEAR_id_g10', $year->id)
            ->whereNull('DB_SECTION_id_g10')
            ->whereNotNull('LG_SECTION_name_g10')
            ->get()
            ->count();

        // Return
        return $year;
    }

    /**
     * FUNCTION: format year (many)
     */
    public function Format_Years ($years) {
        // Order
        $years = $years->orderBy('year', 'DESC')
            ->paginate(100);

        // Format
        foreach ($years as $year) {
            $year = self::Format_Year($year);
        }

        // Return
        return $years;
    }
}