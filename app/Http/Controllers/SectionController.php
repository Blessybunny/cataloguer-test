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

class SectionController extends Controller {
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
     * INDEX
     */
    public function index () {
        // Guard
        $auth = (new Controller)->auth();

        if (self::guard($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::orderBy('grade', 'desc')->get();

        return view('pages.sections.index')
            ->with('auth', $auth)
            ->with('grades', $grades);
    }

    /**
     * VIEW
     */
    public function view ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $grade = Grade::find($id);

        if (
            self::guard($auth) ||
            $grade == null
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $sections = Section::where('DB_GRADE_id', $id)
            ->whereNotNull('section')
            ->get();

        foreach ($sections as $section) {
            $section->adviser = User::find($section->DB_USER_id);
            $section->teachers = Teacher::where('DB_SECTION_id', $section->id)->get();

            foreach ($section->teachers as $teacher => $value) {
                $section->teachers[$teacher] = User::find($value->DB_USER_id);
            }
        }

        $users = User::where('DB_GRADE_id', $id)
            ->where('DB_ROLE_id', 3)
            ->get();

        return view('pages.sections.view')
            ->with('auth', $auth)
            ->with('grade', $grade)
            ->with('sections', $sections)
            ->with('users', $users);
    }

    /**
     * EDIT
     */
    public function edit_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $grade = Grade::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $grade == null
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $sections = Section::where('DB_GRADE_id', $id)->get();

        return view('pages.sections.edit')
            ->with('auth', $auth)
            ->with('grade', $grade)
            ->with('sections', $sections);
    }
    public function edit_2 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $grade = Grade::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $grade == null
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $sections = Section::where('DB_GRADE_id', $id)->get();

        foreach ($sections as $section) {
            $section_old = clone $section;

            $validated = request()->validate([
                'section_'.$section->DB_GRADE_id.'_'.$section->id => 'nullable',
            ]);

            $section->update([
                'section' => $validated['section_'.$section->DB_GRADE_id.'_'.$section->id],
            ]);

            self::func_STUDENT_User_on_name_change($grade, $section, $section_old);
            self::func_STUDENT_Section_on_name_change($grade, $section, $section_old);

            self::func_TEACHER_on_name_change($grade, $section, $section_old);
        }

        $grade->touch();

        return redirect()->to('/sections/edit/'.$id)
            ->with('updated', true);
    }

    // ----------------------------------------------------------------------------------------------------

    /**
     * FUNCTION: on edit
     *      SECTION -> wipe the user ID (tested)
     *      STUDENT -> keep the user name (tested)
     */
    public function func_STUDENT_User_on_name_change ($grade, $section, $section_old) {
        // Guard
        if ($section_old->section === $section->section) {
            return;
        }

        $user = User::find($section->DB_USER_id);

        if ($user == null) {
            return;
        }

        // Proceed
        $section->update([
            'DB_USER_id' => null,
        ]);

        $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();

        foreach ($students as $student) {
            $student->update([
                'LG_USER_name_last_g'.$grade->grade => $user->name_last,
                'LG_USER_name_first_g'.$grade->grade => $user->name_first,
            ]);
        }
    }

    /**
     * FUNCTION: on edit
     *      STUDENT -> wipe the section ID (tested)
     *      STUDENT -> keep the old section name (tested)
     */
    public function func_STUDENT_Section_on_name_change ($grade, $section, $section_old) {
        // Guard
        if ($section_old->section === $section->section) {
            return;
        }

        // Proceed
        $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();

        foreach ($students as $student) {
            $student->update([
                'DB_SECTION_id_g'.$grade->grade => null,
                'LG_SECTION_name_g'.$grade->grade => $section_old->section,
            ]);
        }
    }

    /**
     * FUNCTION: on edit
     *      TEACHER -> delete with section ID (tested)
     */
    public function func_TEACHER_on_name_change ($grade, $section, $section_old) {
        // Guard
        if ($section_old->section === $section->section) {
            return;
        }

        // Proceed
        Teacher::where('DB_SECTION_id', $section->id)->delete();
    }
}