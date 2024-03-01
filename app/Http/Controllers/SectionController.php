<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;

use Request;

class SectionController extends Controller {
    // Restriction
    public function restriction ($auth) {
        if ($auth != null) {
            if ($auth->DB_ROLE_id == 1 || $auth->DB_ROLE_id == 2) {
                return false;
            }
            else {
                return true;
            }
        }
        else {
            return true;
        }
    }

    // Redirect
    public function redirect () {
        // Restriction
        $auth = (new Controller)->auth();

        if (self::restriction($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        return redirect()->to('/sections');
    }

    // Index
    public function index () {
        // Restriction
        $auth = (new Controller)->auth();

        if (self::restriction($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();

        return view('pages.sections.index')
            ->with('auth', $auth)
            ->with('grades', $grades);
    }

    // Edit
    public function edit_1 ($id) {
        // Restriction
        $auth = (new Controller)->auth();

        if (self::restriction($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $grade = Grade::find($id);

        if ($grade != null) {
            $sections = Section::where('DB_GRADE_id', $id)->get();

            return view('pages.sections.edit')
                ->with('auth', $auth)
                ->with('grade', $grade)
                ->with('sections', $sections);
        }
        else {
            return self::redirect();
        }
    }
    public function edit_2 ($id) {
        // Restriction
        $auth = (new Controller)->auth();

        if (self::restriction($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $grade = Grade::find($id);

        if ($grade != null) {
            $sections = Section::where('DB_GRADE_id', $id)->get();

            foreach ($sections as $section) {
                $validate = request()->validate(['section_'.$section->DB_GRADE_id.'_'.$section->id => 'nullable']);

                $section_old = clone $section;

                $section->update(['section' => $validate['section_'.$section->DB_GRADE_id.'_'.$section->id]]);

                self::func_preserve_STUDENT_User_on_name_change($grade, $section, $section_old);
                self::func_preserve_STUDENT_Section_on_name_change($grade, $section, $section_old);
            }

            return redirect()->to('/sections/edit/'.$id);
        }
        else {
            return self::redirect();
        }
    }

    // FUNCTION: apply user preserves from all students with the student's section ID on name change (strict)
    // Edit (POST)
    public function func_preserve_STUDENT_User_on_name_change ($grade, $section, $section_old) {
        if ($section_old->section !== $section->section) {
            $user = User::find($section->DB_USER_id);

            if ($user != null) {
                $section->update(['DB_USER_id' => null]);
                $user->update(['DB_SECTION_id' => null]);

                $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();

                foreach ($students as $student) {
                    $student->update([
                        'PRESERVE_DB_USER_name_last_g'.$grade->grade => $user->name_last,
                        'PRESERVE_DB_USER_name_first_g'.$grade->grade => $user->name_first,
                    ]);
                }
            }
        }
    }

    // FUNCTION: apply section preserves from all students with the student's section ID on name change (strict)
    // Edit (POST)
    public function func_preserve_STUDENT_Section_on_name_change ($grade, $section, $section_old) {
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