<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;

use Request;

class SectionController extends Controller {
    // Redirect
    public function redirect () { return redirect()->to('/sections'); }

    // 1.1 - Index (GET)
    // From the index page, display info
    // Null bubbled
    public function index () {
        $grades = Grade::all();

        return view('pages.sections.index')->with('grades', $grades);
    }

    // 2.1 - Edit (GET)
    // From the edit page, display the fields
    // Null bubbled
    public function edit_1 ($id) {
        $grade = Grade::find($id);
        $sections = Section::where('DB_GRADE_id', $id)->get();

        return view('pages.sections.edit')
            ->with('grade', $grade)
            ->with('sections', $sections);
    }

    // 2.2 - Edit (POST)
    // From the edit page, update the fields
    // Null bubbled
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