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

class SectionController extends Controller {
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
    public function redirect () { return redirect()->to('/sections'); }

    // INDEX
    public function index () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();

        return view('pages.sections.index')
            ->with('auth', $auth)
            ->with('grades', $grades);
    }

    // VIEW
    public function view ($id) {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $grade = Grade::find($id);

        if ($grade != null) {
            $sections = Section::where('DB_GRADE_id', $id)
                ->whereNotNull('section')
                ->get();

            foreach ($sections as $section) {
                $user_4 = User::find($section->DB_USER_id);

                if ($user_4 != null) {
                    $section->user_id = $user_4->id;
                    $section->user_name_last = $user_4->name_last;
                    $section->user_name_first = $user_4->name_first;
                }
            }

            $users_3 = User::orderBy('name_last', 'ASC')
                ->orderBy('name_first', 'ASC')
                ->where('DB_GRADE_id', $id)
                ->where('DB_ROLE_id', 3)
                ->get();

            $users_5 = User::orderBy('name_last', 'ASC')
                ->orderBy('name_first', 'ASC')
                ->where('DB_GRADE_id', $id)
                ->where('DB_ROLE_id', 5)
                ->get();

            return view('pages.sections.view')
                ->with('auth', $auth)
                ->with('grade', $grade)
                ->with('sections', $sections)
                ->with('users_3', $users_3)
                ->with('users_5', $users_5);
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
        // Restrict
        $auth = (new Controller)->auth();

        if (
            self::restrict($auth) ||
            $auth->is_administrator
        ) {
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
    public function func_preserve_STUDENT_User_on_name_change ($grade, $section, $section_old) {
        if ($section_old->section !== $section->section) {
            $user = User::find($section->DB_USER_id);

            if ($user != null) {
                $section->update(['DB_USER_id' => null]);
                $user->update(['DB_SECTION_id' => null]);

                $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();

                foreach ($students as $student) {
                    $student->update([
                        'LG_USER_name_last_g'.$grade->grade => $user->name_last,
                        'LG_USER_name_first_g'.$grade->grade => $user->name_first,
                    ]);
                }
            }
        }
    }

    // FUNCTION: apply section preserves from all students with the student's section ID on name change (strict)
    public function func_preserve_STUDENT_Section_on_name_change ($grade, $section, $section_old) {
        if ($section_old->section !== $section->section) {
            $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();

            foreach ($students as $student) {
                $student->update([
                    'DB_SECTION_id_g'.$grade->grade => null,

                    'LG_SECTION_name_g'.$grade->grade => $section_old->section,
                ]);
            }
        }
    }
}