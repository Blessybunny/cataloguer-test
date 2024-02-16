<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller {
    // Redirect
    public function redirect () { return redirect()->to('/sections'); }

    // Index (GET)
    public function index () { 
        $grades = Grade::orderBy('grade', 'ASC')->get();

        return view('pages.sections.index')->with('grades', $grades);
    }

    // Edit (GET)
    public function edit_1 ($id) { 
        $grades = Grade::where('id', $id)->first();
        $sections = Section::where('db_grade_id', $id)->get();

        return view('pages.sections.edit')->
            with('grades', $grades)->
            with('sections', $sections);
    }

    // Edit (POST)
    public function edit_2 ($grade) {
        $id = Grade::where('grade', $grade)->first()->id;
        $sections = 10; // Section count per grade level (see seeders)
        $index = $sections * ($id - 1);

        $validate = request()->validate([
            'g'.$grade.'_s1' => 'nullable',
            'g'.$grade.'_s2' => 'nullable',
            'g'.$grade.'_s3' => 'nullable',
            'g'.$grade.'_s4' => 'nullable',
            'g'.$grade.'_s5' => 'nullable',
            'g'.$grade.'_s6' => 'nullable',
            'g'.$grade.'_s7' => 'nullable',
            'g'.$grade.'_s8' => 'nullable',
            'g'.$grade.'_s9' => 'nullable',
            'g'.$grade.'_s10' => 'nullable',
        ]);

        Section::where('id', $index + 1)->update(['section' => $validate['g'.$grade.'_s1']]);
        Section::where('id', $index + 2)->update(['section' => $validate['g'.$grade.'_s2']]);
        Section::where('id', $index + 3)->update(['section' => $validate['g'.$grade.'_s3']]);
        Section::where('id', $index + 4)->update(['section' => $validate['g'.$grade.'_s4']]);
        Section::where('id', $index + 5)->update(['section' => $validate['g'.$grade.'_s5']]);
        Section::where('id', $index + 6)->update(['section' => $validate['g'.$grade.'_s6']]);
        Section::where('id', $index + 7)->update(['section' => $validate['g'.$grade.'_s7']]);
        Section::where('id', $index + 8)->update(['section' => $validate['g'.$grade.'_s8']]);
        Section::where('id', $index + 9)->update(['section' => $validate['g'.$grade.'_s9']]);
        Section::where('id', $index + 10)->update(['section' => $validate['g'.$grade.'_s10']]);

        return redirect()->to('/sections/edit/'.$id);
    }
}