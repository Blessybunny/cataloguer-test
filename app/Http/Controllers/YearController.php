<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;

use Request;

// Do-not-touch
// Whitespace-checked

class YearController extends Controller {
    // RESTRICTION
    public function restrict ($auth) {
        if (
            $auth != null &&
            $auth->is_principal ||
            $auth->is_administrator
        ) {
            return false;
        }
        else {
            return true;
        }
    }

    // REDIRECT
    public function redirect () { return redirect()->to('/years'); }

    // INDEX
    public function index_1 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $years = self::func_format_years(Year::query());

        return view('pages.years.index')
            ->with('auth', $auth)
            ->with('years', $years);
    }
    public function index_2 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
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

            $years = self::func_format_years($query);

            return view('pages.years.index')
                ->with('auth', $auth)
                ->with('terms', $terms)
                ->with('years', $years);
        }
        else {
            return self::redirect();
        }
    }

    // CREATE
    public function create_1 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (
            self::restrict($auth) ||
            $auth->is_administrator
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
        // Restrict
        $auth = (new Controller)->auth();

        if (
            self::restrict($auth) ||
            $auth->is_administrator
        ) {
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
    public function edit_1 ($id) {
        // Restrict
        $auth = (new Controller)->auth();

        if (
            self::restrict($auth) ||
            $auth->is_administrator
        ) {
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

        if (
            self::restrict($auth) ||
            $auth->is_administrator
        ) {
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
    public function func_format_years ($years) {
        // Order
        $years = $years->orderBy('year', 'DESC')->get();

        // Format
        foreach ($years as $year) {
            // Name
            $user = User::find($year->DB_USER_id);

            if (
                $user != null &&
                $year->LG_USER_name_last == null &&
                $year->LG_USER_name_first == null
            ) {
                $year->principal = $user->name_last.', '.$user->name_first;
            }
            else if (
                $user == null &&
                $year->LG_USER_name_last != null &&
                $year->LG_USER_name_first != null
            ) {
                $year->principal = $year->LG_USER_name_last.', '.$year->LG_USER_name_first.' (Legacy)';
            }
        }

        // Return
        return $years;
    }

    // FUNCTION: format year (single)
    public function func_format_year ($year) {
        // Name
        $user = User::find($year->DB_USER_id);

        if (
            $user != null &&
            $year->LG_USER_name_last == null &&
            $year->LG_USER_name_first == null
        ) {
            $year->principal = $user->name_last.', '.$user->name_first;
        }
        else if (
            $user == null &&
            $year->LG_USER_name_last != null &&
            $year->LG_USER_name_first != null
        ) {
            $year->principal = $year->LG_USER_name_last.', '.$year->LG_USER_name_first.' (Legacy)';
        }

        // Return
        return $year;
    }
}