<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;

use Request;

class YearController extends Controller {
    // RESTRICTION
    // ALLOWED: 1, 2
    public function restrict ($auth) {
        if ($auth != null) {
            if (
                $auth->DB_ROLE_id == 1 ||
                $auth->DB_ROLE_id == 2
            ) {
                return false;
            }
            else {
                return true;
            }
        }
        else {
            return true;
        }
    }

    // REDIRECT
    public function redirect () { return redirect()->to('/years'); }

    // INDEX
    // DENIED: 2
    public function index_1 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Deny (HTML)
        $deny = new Role();
        $deny->administrator = $auth->DB_ROLE_id == 2 ? false : true;

        // Proceed
        $years = Year::orderBy('year', 'DESC')->get();

        $years = self::func_format_years($years);

        return view('pages.years.index')
            ->with('auth', $auth)
            ->with('deny', $deny)
            ->with('years', $years);
    }
    public function index_2 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Deny (HTML)
        $deny = new Role();
        $deny->administrator = $auth->DB_ROLE_id == 2 ? false : true;

        // Proceed
        $terms = Request::get('terms');

        if (isset($terms)) {
            $terminology = explode(' ', $terms);
            $query = Year::query();

            foreach ($terminology as $term) {
                $query->where(function ($q) use ($term) {
                    $q->where('full', 'like', '%'.$term.'%');
                });
            }

            $results = $query->orderBy('year', 'DESC')->get();
            $results = (count($results) > 0) ? $results : [];

            $results = self::func_format_years($results);

            return view('pages.years.index')
                ->with('auth', $auth)
                ->with('deny', $deny)
                ->with('isSearched', true)
                ->with('terms', $terms)
                ->with('results', $results);
        }
        else {
            return self::redirect();
        }
    }

    // CREATE
    // DENIED: 2
    public function create_1 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Deny (restrict)
        if ($auth->DB_ROLE_id == 2) {
            return (new Controller)->home();
        }

        // Proceed
        $users = User::where('DB_ROLE_id', '1')->get();

        return view('pages.years.create')
            ->with('auth', $auth)
            ->with('users', $users);
    }
    public function create_2 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Deny (restrict)
        if ($auth->DB_ROLE_id == 2) {
            return (new Controller)->home();
        }

        // Proceed
        $validate = request()->validate([
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

        Year::create([
            'DB_USER_id' => $validate['DB_USER_id'],

            'LG_USER_name_last' =>  $validate['DB_USER_id'] == null ? $validate['LG_USER_name_last'] : null,
            'LG_USER_name_first' => $validate['DB_USER_id'] == null ? $validate['LG_USER_name_first'] : null,

            'year' => $validate['year'],
            'full' => $validate['year'].'-'.$validate['year'] + 1,

            'attendance_jan_t' => $validate['attendance_jan_t'],
            'attendance_feb_t' => $validate['attendance_feb_t'],
            'attendance_mar_t' => $validate['attendance_mar_t'],
            'attendance_apr_t' => $validate['attendance_apr_t'],
            'attendance_may_t' => $validate['attendance_may_t'],
            'attendance_jun_t' => $validate['attendance_jun_t'],
            'attendance_jul_t' => $validate['attendance_jul_t'],
            'attendance_aug_t' => $validate['attendance_aug_t'],
            'attendance_sep_t' => $validate['attendance_sep_t'],
            'attendance_oct_t' => $validate['attendance_oct_t'],
            'attendance_nov_t' => $validate['attendance_nov_t'],
            'attendance_dec_t' => $validate['attendance_dec_t'],
        ]);

        return self::redirect();
    }

    // VIEW
    public function view ($id) {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $year = Year::find($id);

        if ($year != null) {
            $year = self::func_format_year($year);

            return view('pages.years.view')
                ->with('auth', $auth)
                ->with('year', $year);
        }
        else {
            return self::redirect();
        }
    }

    // EDIT
    // DENIED: 2
    public function edit_1 ($id) {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Deny (restrict)
        if ($auth->DB_ROLE_id == 2) {
            return (new Controller)->home();
        }

        // Proceed
        $year = Year::find($id);

        if ($year != null) {
            $users = User::where('DB_ROLE_id', '1')->get();

            return view('pages.years.edit')
                ->with('auth', $auth)
                ->with('users', $users)
                ->with('year', $year);
        }
        else {
            return self::redirect();
        }
    }
    public function edit_2 ($id) {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Deny (restrict)
        if ($auth->DB_ROLE_id == 2) {
            return (new Controller)->home();
        }

        // Proceed
        $year = Year::find($id);

        if ($year != null) {
            $validate = request()->validate([
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
                'DB_USER_id' => $validate['DB_USER_id'],

                'LG_USER_name_last' => $validate['DB_USER_id'] == null ? $validate['LG_USER_name_last'] : null,
                'LG_USER_name_first' => $validate['DB_USER_id'] == null ? $validate['LG_USER_name_first'] : null,

                'attendance_jan_t' => $validate['attendance_jan_t'],
                'attendance_feb_t' => $validate['attendance_feb_t'],
                'attendance_mar_t' => $validate['attendance_mar_t'],
                'attendance_apr_t' => $validate['attendance_apr_t'],
                'attendance_may_t' => $validate['attendance_may_t'],
                'attendance_jun_t' => $validate['attendance_jun_t'],
                'attendance_jul_t' => $validate['attendance_jul_t'],
                'attendance_aug_t' => $validate['attendance_aug_t'],
                'attendance_sep_t' => $validate['attendance_sep_t'],
                'attendance_oct_t' => $validate['attendance_oct_t'],
                'attendance_nov_t' => $validate['attendance_nov_t'],
                'attendance_dec_t' => $validate['attendance_dec_t'],
            ]);

            return redirect()->to('/years/edit/'.$id);
        }
        else {
            return self::redirect();
        }
    }

    // FUNCTION: format year (multiple)
    // index_1, index_2
    public function func_format_years ($years) {
        foreach ($years as $year) {
            // Name
            $user = User::find($year->DB_USER_id);
            $user_name_last = $year->LG_USER_name_last;
            $user_name_first = $year->LG_USER_name_first;

            if (
                $user != null &&
                $user_name_last == null &&
                $user_name_first == null
            ) {
                $year->principal = $user->name_last.', '.$user->name_first;
            }
            else if (
                $user == null &&
                $user_name_last != null &&
                $user_name_first != null
            ) {
                $year->principal = $user_name_last.', '.$user_name_first.' (Legacy)';
            }
        }

        // Return
        return $years;
    }

    // FUNCTION: format year (single)
    // view
    public function func_format_year ($year) {
        // Name
        $user = User::find($year->DB_USER_id);
        $user_name_last = $year->LG_USER_name_last;
        $user_name_first = $year->LG_USER_name_first;

        if (
            $user != null &&
            $user_name_last == null &&
            $user_name_first == null
        ) {
            $year->principal = $user->name_last.', '.$user->name_first;
        }
        else if (
            $user == null &&
            $user_name_last != null &&
            $user_name_first != null
        ) {
            $year->principal = $user_name_last.', '.$user_name_first.' (Legacy)';
        }

        // Return
        return $year;
    }
}