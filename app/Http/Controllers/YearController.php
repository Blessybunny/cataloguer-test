<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Request;

class YearController extends Controller {
    // Redirect
    public function redirect () { return redirect()->to('/years'); }

    // Index (GET)
    public function index_1 () {
        $years = Year::orderBy('year', 'ASC')->get();

        return view('pages.years.index')->with('years', $years);
    }

    // Index (POST)
    public function index_2 () {
        $cake = Request::get('cake');

        if (isset($cake)) {
            $results = Year::where('year','LIKE','%'.$cake.'%')->get();
            $results = (count($results) > 0) ? $results : [];

            return view('pages.years.index')->
                with('isSearched', true)->
                with('cake', $cake)->
                with('results', $results);
        }
        else return redirect()->to('/years');
    }

    // Create (GET)
    public function create_1 () {
        return view('pages.years.create');
    }

    // Create (POST)
    public function create_2 () {
        $validate = request()->validate([
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
        $year = Year::findOrFail($id);

        return view('pages.years.edit')->with('year', $year);
    }

    // Edit (POST)
    public function edit_2 ($id) {
        $validate = request()->validate([
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

        Year::where('id', $id)->update([
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
}
