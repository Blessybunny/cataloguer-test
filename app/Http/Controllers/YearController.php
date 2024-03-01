<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;

use Request;

class YearController extends Controller {
    // Protect
    public function protect ($auth) {
        if ($auth->DB_ROLE_id == 1 || $auth->DB_ROLE_id == 2) {
            return false;
        }
        else {
            return true;
        }
    }

    // Redirect
    public function redirect () {
        // Protect
        $auth = (new Controller)->auth();

        if (self::protect($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        return redirect()->to('/years');
    }

    // Index (GET)
    public function index_1 () {
        // Protect
        $auth = (new Controller)->auth();

        if (self::protect($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $years = Year::orderBy('year', 'DESC')->get();

        $years = self::func_format_years($years);

        return view('pages.years.index')
            ->with('auth', $auth)
            ->with('years', $years);
    }

    // Index (POST)
    public function index_2 () {
        // Protect
        $auth = (new Controller)->auth();

        if (self::protect($auth)) {
            return (new Controller)->home();
        }

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
                ->with('isSearched', true)
                ->with('auth', $auth)
                ->with('terms', $terms)
                ->with('results', $results);
        }
        else {
            return self::redirect();
        }
    }

    // Create (GET)
    public function create_1 () {
        // Protect
        $auth = (new Controller)->auth();

        if (self::protect($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $users = User::where('DB_ROLE_id', '1')->get();

        return view('pages.years.create')
            ->with('auth', $auth)
            ->with('users', $users);
    }

    // Create (POST)
    public function create_2 () {
        // Protect
        $auth = (new Controller)->auth();

        if (self::protect($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $validate = request()->validate([
            'DB_USER_id' => 'nullable',
            
            'PRESERVE_DB_USER_name_last' => 'nullable',
            'PRESERVE_DB_USER_name_first' => 'nullable',

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

            'PRESERVE_DB_USER_name_last' =>  $validate['DB_USER_id'] == null ? $validate['PRESERVE_DB_USER_name_last'] : null,
            'PRESERVE_DB_USER_name_first' => $validate['DB_USER_id'] == null ? $validate['PRESERVE_DB_USER_name_first'] : null,

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

    // View (GET)
    public function view ($id) {
        // Protect
        $auth = (new Controller)->auth();

        if (self::protect($auth)) {
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

    // Edit (GET)
    public function edit_1 ($id) {
        // Protect
        $auth = (new Controller)->auth();

        if (self::protect($auth)) {
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

    // Edit (POST)
    public function edit_2 ($id) {
        // Protect
        $auth = (new Controller)->auth();

        if (self::protect($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $year = Year::find($id);

        if ($year != null) {
            $validate = request()->validate([
                'DB_USER_id' => 'nullable',

                'PRESERVE_DB_USER_name_last' => 'nullable',
                'PRESERVE_DB_USER_name_first' => 'nullable',

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

                'PRESERVE_DB_USER_name_last' =>  $validate['DB_USER_id'] == null ? $validate['PRESERVE_DB_USER_name_last'] : null,
                'PRESERVE_DB_USER_name_first' => $validate['DB_USER_id'] == null ? $validate['PRESERVE_DB_USER_name_first'] : null,

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

    // FUNCTION: format year (array)
    // Index (GET)
    // Index (POST)
    public function func_format_years ($years) {
        foreach ($years as $year) {
            $user = User::find($year->DB_USER_id);
            $user_name_last = $year->PRESERVE_DB_USER_name_last;
            $user_name_first = $year->PRESERVE_DB_USER_name_first;

            if (
                $user != null &&
                $user_name_last == null &&
                $user_name_first == null
            ) {
                $year->principal = $user->name_last.', '.$user->name_first;
            }
            else if (
                $user == null &&
                $user_name_last == null &&
                $user_name_first == null
            ) {
                $year->principal = 'N/A';
            }
            else if (
                $user == null &&
                $user_name_last != null &&
                $user_name_first != null
            ) {
                $year->principal = $user_name_last.', '.$user_name_first.' (Legacy)';
            }
        }

        return $years;
    }

    // FUNCTION: format year (single)
    // View (GET)
    public function func_format_year ($year) {
        $user = User::find($year->DB_USER_id);
        $user_name_last = $year->PRESERVE_DB_USER_name_last;
        $user_name_first = $year->PRESERVE_DB_USER_name_first;

        if (
            $user != null &&
            $user_name_last == null &&
            $user_name_first == null
        ) {
            $year->principal = $user->name_last.', '.$user->name_first;
        }
        else if (
            $user == null &&
            $user_name_last == null &&
            $user_name_first == null
        ) {
            $year->principal = 'N/A';
        }
        else if (
            $user == null &&
            $user_name_last != null &&
            $user_name_first != null
        ) {
            $year->principal = $user_name_last.', '.$user_name_first.' (Legacy)';
        }

        return $year;
    }
}
