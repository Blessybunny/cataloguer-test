<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;

use Request;

class SectionController extends Controller {
    // Redirect
    public function redirect () { return redirect()->to('/sections'); }

    // 1.1 - Index (GET)
    // From the index page, display info
    public function index () {
        $grades = Grade::all();

        return view('pages.sections.index')->with('grades', $grades);
    }

    // 2.1 - Edit (GET)
    // From the edit page, display the fields
    public function edit_1 ($id) {
        $grade = Grade::find($id);
        $sections = Section::where('DB_GRADE_id', $id)->get();

        return view('pages.sections.edit')
            ->with('grade', $grade)
            ->with('sections', $sections);
    }

    // 2.2 - Edit (POST)
    // From the edit page, update the fields
    public function edit_2 ($id) {
        $grade = Grade::find($id);
        $sections = Section::where('DB_GRADE_id', $id)->get();

        foreach ($sections as $section) {
            $validate = request()->validate(['section_'.$section->DB_GRADE_id.'_'.$section->id => 'nullable']);

            $section_old = clone $section;

            $section->update(['section' => $validate['section_'.$section->DB_GRADE_id.'_'.$section->id]]);

            self::func_edit_preserve_STUDENT_Section_on_name_change($grade, $section, $section_old);
        }

        return redirect()->to('/sections/edit/'.$id);
    }

    // Functions
    // From the edit page, unassign all students from the section and preserve the section's name on those students on any change (strict)
    public function func_edit_preserve_STUDENT_Section_on_name_change ($grade, $section, $section_old) {
        if ($section_old->section !== $section->section) {
            $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();

            foreach ($students as $student) {
                $student->update([
                    'DB_SECTION_id_g'.$grade->grade => null,

                    'PRESERVE_DB_SECTION_name_g'.$grade->grade => $section_old->section,
                ]);
            }
        }
    }
}