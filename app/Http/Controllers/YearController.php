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
     * REDIRECT
     */
    public function redirect () { return redirect()->to('/years'); }

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

        Year::create([
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

        return self::redirect();
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

        return view('pages.years.view')
            ->with('auth', $auth)
            ->with('year', $year);
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

        return redirect()->to('/years/edit/'.$id);
    }

    // ----------------------------------------------------------------------------------------------------

    /**
     * FUNCTION: format year (one)
     */
    public function Format_Year ($year) {
        // Name
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
            $year->user_name_last = $year->LG_USER_name_last;
            $year->user_name_first = $year->LG_USER_name_first;
        }

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