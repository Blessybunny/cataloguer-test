<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;

use Request;

class SectionController extends Controller {
    // Redirect
    public function redirect () { return redirect()->to('/sections'); }

    // Index (GET)
    public function index () {
        $grades = Grade::all();

        return view('pages.sections.index')->with('grades', $grades);
    }

    // Edit (GET)
    public function edit_1 ($id) {
        $grade = Grade::find($id);
        $sections = Section::where('DB_GRADE_id', $id)->get();

        return view('pages.sections.edit')
            ->with('grade', $grade)
            ->with('sections', $sections);
    }

    // Edit (POST)
    public function edit_2 ($id) {
        $grade = Grade::find($id);
        $sections = Section::where('DB_GRADE_id', $id)->get();

        foreach ($sections as $section) {
            $validate = request()->validate(['section_'.$section->DB_GRADE_id.'_'.$section->id => 'nullable']);

            $section->update(['section' => $validate['section_'.$section->DB_GRADE_id.'_'.$section->id]]);
        }

        return redirect()->to('/sections/edit/'.$id);
    }
}