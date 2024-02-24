<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;

use Request;

class YearController extends Controller {
    // Redirect
    public function redirect () { return redirect()->to('/years'); }

    // 1.1 - Index (GET)
    // From the index page, display info
    public function index_1 () {
        $years = Year::orderBy('year', 'DESC')->get();

        $years = self::func_index_make_info($years);

        return view('pages.years.index')->with('years', $years);
    }

    // 1.2 - Index (POST)
    // From the index page, display info from the search
    public function index_2 () {
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

            $results = self::func_index_make_info($results);

            return view('pages.years.index')
                ->with('isSearched', true)
                ->with('terms', $terms)
                ->with('results', $results);
        }
        else return redirect()->to('/years');
    }

    // 2.1 - Create (GET)
    // From the create page, display the fields
    public function create_1 () {
        $users = User::where('DB_ROLE_id', '1')->get();

        return view('pages.years.create')->with('users', $users);
    }

    // 2.2 - Create (POST)
    // From the create page, create the fields
    public function create_2 () {
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

        return redirect()->to('/years');
    }

    // 3.1 - Edit (GET)
    // From the edit page, display the fields
    public function edit_1 ($id) {
        $users = User::where('DB_ROLE_id', '1')->get();
        $year = Year::find($id);

        return view('pages.years.edit')
            ->with('users', $users)
            ->with('year', $year);
    }

    // 3.2 - Edit (POST)
    // From the edit page, update the fields
    public function edit_2 ($id) {
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

        Year::find($id)->update([
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

    // Functions
    // From the index page, make info
    public function func_index_make_info ($param) {
        foreach ($param as $year) {
            $user = User::find($year->DB_USER_id);

            if ($user != null) {
                $year->principal = strtoupper($user->name_last).', '.ucfirst($user->name_first);
            }
            else {
                $year->principal = 'N/A';
            }

            if ($year->DB_USER_id == null && $year->PRESERVE_DB_USER_name_last != null && $year->PRESERVE_DB_USER_name_first !== null) {
                $year->principal = strtoupper($year->PRESERVE_DB_USER_name_last).', '.ucfirst($year->PRESERVE_DB_USER_name_first).' (Preserved)';
            }
        }

        return $param;
    }
}
