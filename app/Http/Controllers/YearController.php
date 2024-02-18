<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Request;

class YearController extends Controller {
    // Redirect
    public function redirect () { return redirect()->to('/years'); }

    // Index (GET)
    public function index_1 () {
        $years = Year::orderBy('year', 'DESC')->get();

        return view('pages.years.index')->with('years', $years);
    }

    // Index (POST)
    public function index_2 () {
        $terms = Request::get('terms');

        if (isset($terms)) {
            $terminology = explode(' ', $terms);
            $query = Year::query();

            foreach($terminology as $term){
                $query->where(function ($q) use ($term) {
                    $q->where('year', 'like', '%'.$term.'%');
                });
            }

            $results = $query->get();
            $results = (count($results) > 0) ? $results : [];

            return view('pages.years.index')
                ->with('isSearched', true)
                ->with('terms', $terms)
                ->with('results', $results);
        }
        else return redirect()->to('/years');
    }

    // Create (GET)
    public function create_1 () {
        $users = User::where('db_role_id', '1')->get();

        return view('pages.years.create')->with('users', $users);
    }

    // Create (POST)
    public function create_2 () {
        $validate = request()->validate([
            'DB_USER_id' => 'nullable',

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

            'year' => $validate['year'],

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

    // Edit (GET)
    public function edit_1 ($id) {
        $users = User::where('db_role_id', '1')->get();
        $year = Year::find($id);

        return view('pages.years.edit')
            ->with('users', $users)
            ->with('year', $year);
    }

    // Edit (POST)
    public function edit_2 ($id) {
        $validate = request()->validate([
            'DB_USER_id' => 'nullable',

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

        $year = Year::find($id);

        $year->update([
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

        if ($validate['DB_USER_id'] != null) {
            if ($validate['DB_USER_id'] != "remember") {
                $year->update([
                    'DB_USER_id' => $validate['DB_USER_id'],

                    'REMEMBER_DB_USER_name_last' => null,
                    'REMEMBER_DB_USER_name_first' => null,
                ]);
            }
        }
        else {
            $year->update([
                'DB_USER_id' => null,

                'REMEMBER_DB_USER_name_last' => null,
                'REMEMBER_DB_USER_name_first' => null,
            ]);
        }

        return redirect()->to('/years/edit/'.$id);
    }
}
