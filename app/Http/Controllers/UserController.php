<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Year;

use Request;

class UserController extends Controller {
    // GUARD
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

    // REDIRECT
    public function redirect () { return redirect()->to('/users'); }

    // INDEX
    public function index () {
        // Guard
        $auth = (new Controller)->auth();

        if (self::guard($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $terms = Request::get('terms');
        $search = explode(' ', $terms);
        $users = User::query();

        foreach ($search as $term) {
            $users->where(function ($q) use ($term) {
                $q->where('name_last', 'like', '%'.$term.'%')
                ->orWhere('name_first', 'like', '%'.$term.'%');
            });
        }

        $users = self::func_format_users($auth, $users);

        return view('pages.users.index')
            ->with('auth', $auth)
            ->with('terms', $terms)
            ->with('users', $users);
    }

    // CREATE
    public function create_1 () {
        // Guard
        $auth = (new Controller)->auth();

        if (self::guard($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();
        $roles = self::func_format_roles($auth, Role::query());
        $sections = Section::whereNotNull('section')
            ->whereNull('DB_USER_id')
            ->get();
        $sections_teacher_g7 = Section::whereNotNull('section')
            ->where('DB_GRADE_id', 1)
            ->get();
        $sections_teacher_g8 = Section::whereNotNull('section')
            ->where('DB_GRADE_id', 2)
            ->get();
        $sections_teacher_g9 = Section::whereNotNull('section')
            ->where('DB_GRADE_id', 3)
            ->get();
        $sections_teacher_g10 = Section::whereNotNull('section')
            ->where('DB_GRADE_id', 4)
            ->get();
        $years = Year::all();

        $sections = self::func_format_sections($sections);
        $sections_teacher_g7 = self::func_format_sections($sections_teacher_g7);
        $sections_teacher_g8 = self::func_format_sections($sections_teacher_g8);
        $sections_teacher_g9 = self::func_format_sections($sections_teacher_g9);
        $sections_teacher_g10 = self::func_format_sections($sections_teacher_g10);

        return view('pages.users.create')
            ->with('auth', $auth)
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections)
            ->with('sections_teacher_g7', $sections_teacher_g7)
            ->with('sections_teacher_g8', $sections_teacher_g8)
            ->with('sections_teacher_g9', $sections_teacher_g9)
            ->with('sections_teacher_g10', $sections_teacher_g10)
            ->with('years', $years);
    }
    public function create_2 () {
        // Guard
        $auth = (new Controller)->auth();

        if (self::guard($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $validated = request()->validate([
            'DB_GRADE_id' => 'nullable',
            'DB_ROLE_id' => 'required',
            'DB_YEAR_id' => 'nullable',

            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',

            'name_last' => 'required',
            'name_first' => 'required',
        ]);

        $validated = self::func_validate_role($validated);

        $user = User::create([
            'DB_GRADE_id' => $validated['DB_GRADE_id'],
            'DB_ROLE_id' => $validated['DB_ROLE_id'],
            'DB_YEAR_id' => $validated['DB_YEAR_id'],

            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),

            'name_last' => $validated['name_last'],
            'name_first' => $validated['name_first'],
        ]);

        self::func_designation_clear_adviser($user);
        // func_designation_clear_teacher not needed
        self::func_designation_adviser($user);
        self::func_designation_teacher($user);

        return self::redirect();
    }

    // VIEW
    public function view ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::guard($auth) ||
            $user == null
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $user = self::func_format_user($auth, $user);

        return view('pages.users.view')
            ->with('auth', $auth)
            ->with('user', $user);
    }

    // EDIT
    public function edit_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::guard($auth) ||
            $user == null ||
            $auth->is_administrator &&
            (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            )
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();
        $roles = self::func_format_roles($auth, Role::query());
        $sections = Section::whereNotNull('section')
            ->whereNull('DB_USER_id')
            ->orWhere('DB_USER_id', $user->id)
            ->get();
        $sections_teacher_g7 = Section::whereNotNull('section')
            ->where('DB_GRADE_id', 1)
            ->get();
        $sections_teacher_g8 = Section::whereNotNull('section')
            ->where('DB_GRADE_id', 2)
            ->get();
        $sections_teacher_g9 = Section::whereNotNull('section')
            ->where('DB_GRADE_id', 3)
            ->get();
        $sections_teacher_g10 = Section::whereNotNull('section')
            ->where('DB_GRADE_id', 4)
            ->get();
        $years = Year::all();

        $sections = self::func_format_sections($sections);
        $sections_teacher_g7 = self::func_format_sections_teacher($sections_teacher_g7, $user);
        $sections_teacher_g8 = self::func_format_sections_teacher($sections_teacher_g8, $user);
        $sections_teacher_g9 = self::func_format_sections_teacher($sections_teacher_g9, $user);
        $sections_teacher_g10 = self::func_format_sections_teacher($sections_teacher_g10, $user);

        $user->is_one_day_old = strtotime($user->updated_at) < strtotime('-1 day');

        return view('pages.users.edit')
            ->with('auth', $auth)
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections)
            ->with('sections_teacher_g7', $sections_teacher_g7)
            ->with('sections_teacher_g8', $sections_teacher_g8)
            ->with('sections_teacher_g9', $sections_teacher_g9)
            ->with('sections_teacher_g10', $sections_teacher_g10)
            ->with('years', $years)
            ->with('user', $user);
    }
    public function edit_2 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $user = User::find($id);
        $user_old = clone $user;

        if (
            self::guard($auth) ||
            $user == null ||
            $auth->is_administrator &&
            (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            )
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $validated = request()->validate([
            'DB_GRADE_id' => 'nullable',
            'DB_ROLE_id' => 'required',
            'DB_YEAR_id' => 'nullable',

            'name_last' => 'required',
            'name_first' => 'required',
        ]);

        $validated = self::func_validate_role($validated);

        $user->update([
            'DB_GRADE_id' => $validated['DB_GRADE_id'],
            'DB_ROLE_id' => $validated['DB_ROLE_id'],
            'DB_YEAR_id' => $validated['DB_YEAR_id'],

            'name_last' => $validated['name_last'],
            'name_first' => $validated['name_first'],
        ]);

        $user->touch();

        self::func_preserve_STUDENT_User_on_role_change($user, $user_old);
        self::func_preserve_STUDENT_User_on_section_change($user, $user_old);
        self::func_preserve_YEAR_User_on_role_change($user, $user_old);

        self::func_designation_clear_adviser($user);
        self::func_designation_clear_teacher($user);
        self::func_designation_adviser($user);
        self::func_designation_teacher($user);

        return redirect()->to('/users/edit/'.$id);
    }

    // PASSWORD
    public function password_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::guard($auth) ||
            $user == null ||
            $auth->is_administrator &&
            (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            )
        ) {
            return (new Controller)->home();
        }

        // Proceed
        return view('pages.users.password')
            ->with('auth', $auth)
            ->with('user', $user);
    }
    public function password_2 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::guard($auth) ||
            $user == null ||
            $auth->is_administrator &&
            (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            )
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $validated = request()->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $user->update([
            'password' => bcrypt($validated['password']),
        ]);

        $user->touch();

        return redirect()->to('/users/edit/'.$id);
    }

    // DELETE
    public function delete_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::guard($auth) ||
            $user == null ||
            $auth->is_administrator &&
            (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            ) ||
            !(strtotime($user->updated_at) < strtotime('-1 day'))
        ) {
            return (new Controller)->home();
        }

        // Proceed
        return view('pages.users.delete')
            ->with('auth', $auth)
            ->with('user', $user);
    }
    public function delete_2 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::guard($auth) ||
            $user == null ||
            $auth->is_administrator &&
            (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            ) ||
            !(strtotime($user->updated_at) < strtotime('-1 day'))
        ) {
            return (new Controller)->home();
        }

        // Proceed
        self::func_preserve_STUDENT_User_on_deletion($user);
        self::func_preserve_YEAR_User_on_deletion($user);

        self::func_designation_clear_adviser($user);
        self::func_designation_clear_teacher($user);

        $user->delete();

        return self::redirect();
    }

    // ----------------------------------------------------------------------------------------------------

    /*
        FUNCTION:
        Format user (single)
    */
    public function func_format_user ($auth, $user) {
        // Role
        $role = Role::find($user->DB_ROLE_id);

        if ($role != null) {
            $user->role = $role->role;
        }

        // School Year Designation
        $year = Year::find($user->DB_YEAR_id);

        if ($year != null) {
            $user->year = $year->full;
        }

        // Grade Level Coordinator's Designation
        $grade = Grade::find($user->DB_GRADE_id);

        if ($grade != null) {
            $user->designation_user_3 = 'Grade '.$grade->grade;
        }

        // Adviser's Designation
        $section = Section::where('DB_USER_id', $user->id)->first();

        if ($section != null) {
            $grade = Grade::find($section->DB_GRADE_id);
            
            if ($grade != null) {
                $user->designation_user_4_1 = 'Grade '.$grade->grade.' | '.$section->section;
            }
        }

        // Teacher's Designation
        $user->designation_user_4_2 = Teacher::where('DB_USER_id', $user->id)->get();

        foreach ($user->designation_user_4_2 as $class => $value) {
            $user->designation_user_4_2[$class] = Section::find($value->DB_SECTION_id);

            $grade = Grade::find($user->designation_user_4_2[$class]->DB_GRADE_id);

            if ($grade != null) {
                $user->designation_user_4_2[$class]->grade = $grade->grade;
            }
        }

        // Editability
        if (
            $auth->is_administrator &&
            (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            )
        ) {
            $user->is_editable = false;
        }
        else {
            $user->is_editable = true;
        }

        // Return
        return $user;
    }

    /*
        FUNCTION:
        Format user (multiple)
    */
    public function func_format_users ($auth, $users) {
        // Order
        $users = $users->orderBy('DB_ROLE_id', 'ASC')
            ->orderBy('name_last', 'ASC')
            ->orderBy('name_first', 'ASC')
            ->paginate(100);

        // Format
        foreach ($users as $user) {
            $user = self::func_format_user($auth, $user);
        }

        // Return
        return $users;
    }

    /*
        FUNCTION:
        Format role (multiple)
    */
    public function func_format_roles ($auth, $roles) {
        if ($auth->is_administrator) {
            return $roles->where('id', 3)
                ->orWhere('id', 4)
                ->get();
        }
        else {
            return $roles->get();
        }
    }

    /*
        FUNCTION:
        Format section (multiple)
    */
    public function func_format_sections ($sections) {
        foreach ($sections as $section) {
            $grade = Grade::find($section->DB_GRADE_id);

            if ($grade != null) {
                $section->grade = $grade->grade;
            }
        }

        return $sections;
    }
    public function func_format_sections_teacher ($sections, $user) {
        foreach ($sections as $section) {
            $grade = Grade::find($section->DB_GRADE_id);

            if ($grade != null) {
                $section->grade = $grade->grade;
                $section->is_existing = Teacher::where('DB_SECTION_ID', $section->id)->where('DB_USER_id', $user->id)->exists();
            }
        }

        return $sections;
    }

    /*
        FUNCTION:
        Validate role
    */
    public function func_validate_role ($validated) {
        if (
            $validated['DB_ROLE_id'] == '1' ||
            $validated['DB_ROLE_id'] == '2'
        ) {
            $validated['DB_GRADE_id'] = null;
            $validated['DB_SECTION_id'] = null;
            $validated['DB_YEAR_id'] = null;
        }
        else if ($validated['DB_ROLE_id'] == '3') {
            $validated['DB_SECTION_id'] = null;
        }
        else if ($validated['DB_ROLE_id'] == '4') {
            $validated['DB_GRADE_id'] = null;
        }

        return $validated;
    }

    /*
        FUNCTION:
        On role change:
            ...preserve the associated adviser's name (if any) on all students (if any)
    */
    public function func_preserve_STUDENT_User_on_role_change ($user, $user_old) {
        // Guard
        if (
            $user_old->DB_ROLE_id != 4 ||
            $user_old->DB_ROLE_id == $user->DB_ROLE_id
        ) {
            return;
        }

        $section = Section::where('DB_USER_id', $user->id)->first();

        if ($section == null) {
            return;
        }

        $grade = Grade::find($section->DB_GRADE_id);

        if ($grade == null) {
            return;
        }

        // Proceed
        $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();

        foreach ($students as $student) {
            $student->update([
                'LG_USER_name_last_g'.$grade->grade => $user->name_last,
                'LG_USER_name_first_g'.$grade->grade => $user->name_first,
            ]);
        }
    }

    /*
        FUNCTION:
        On section change:
            ...preserve the associated adviser's name (if any) on all students (if any)
    */
    public function func_preserve_STUDENT_User_on_section_change ($user, $user_old) {
        // Guard
        if ($user_old->DB_ROLE_id != 4) {
            return;
        }

        $section = Section::where('DB_USER_id', $user->id)->first();

        if ($section == null) {
            return;
        }

        $grade = Grade::find($section->DB_GRADE_id);

        if ($grade == null) {
            return;
        }

        // Proceed
        $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();

        foreach ($students as $student) {
            $student->update([
                'LG_USER_name_last_g'.$grade->grade => $user->name_last,
                'LG_USER_name_first_g'.$grade->grade => $user->name_first,
            ]);
        }
    }

    /*
        FUNCTION:
        On section change:
            ...preserve the associated principal's name (if any) on all school years (if any)
    */
    public function func_preserve_YEAR_User_on_role_change ($user, $user_old) {
        // Guard
        if (
            $user_old->DB_ROLE_id != 1 ||
            $user_old->DB_ROLE_id == $user->DB_ROLE_id
        ) {
            return;
        }

        // Proceed
        $years = Year::where('DB_USER_id', $user->id)->get();

        foreach ($years as $year) {
            $year->update([
                'DB_USER_id' => null,
                'LG_USER_name_last' => $user->name_last,
                'LG_USER_name_first' => $user->name_first,
            ]);
        }
    }

    /*
        FUNCTION:
        Clear the section's adviser ID (if any)
        Delete the multisection teacher's IDs (if any)
    */
    public function func_designation_clear_adviser ($user) {
        $section = Section::where('DB_USER_id', $user->id)->first();

        if ($section != null) {
            $section->update(['DB_USER_id' => null]);
        }
    }
    public function func_designation_clear_teacher ($user) {
        Teacher::where('DB_USER_id', $user->id)->delete();
    }

    /*
        FUNCTION:
        Apply the section's adviser ID (if any)
        Clear the associated adviser's name (if any) on all students (if any)
    */
    public function func_designation_adviser ($user) {
        // Guard
        if ($user->DB_ROLE_id != 4) {
            return;
        }

        $validated = request()->validate([
            'DB_SECTION_id' => 'nullable',
        ]);

        $section = Section::find($validated['DB_SECTION_id']);

        if ($section == null) {
            return;
        }

        $grade = Grade::find($section->DB_GRADE_id);

        if ($grade == null) {
            return;
        }

        // Proceed
        $section->update([
            'DB_USER_id' => $user->id,
        ]);

        $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();

        foreach ($students as $student) {
            $student->update([
                'LG_USER_name_last_g'.$grade->grade => null,
                'LG_USER_name_first_g'.$grade->grade => null,
            ]);
        }
    }

    /*
        FUNCTION:
        Manage the multisection teacher's IDs (if any)
    */
    public function func_designation_teacher ($user) {
        // Guard
        if ($user->DB_ROLE_id != 4) {
            return;
        }

        // Proceed
        $instances = Teacher::where('DB_USER_id', $user->id)->get();
        $sections_checked = array();

        foreach ($instances as $instance) {
            array_push($sections_checked, $instance->DB_SECTION_id);
        }

        $validated = request()->validate([
            'DB_SECTION_MULTI_id' => 'nullable',
        ]);

        // Delete if unchecked (if nothing else is checked)
        if (!isset($validated['DB_SECTION_MULTI_id'])) {
            Teacher::where('DB_USER_id', $user->id)->delete();
        }
        else {
            // Check if existing in the database
            $exists = array();

            foreach ($validated['DB_SECTION_MULTI_id'] as $exist) {
                if (Teacher::where('DB_USER_id', $user->id)->where('DB_SECTION_id', $exist)->exists()) {
                    array_push($exists, $exist);
                }
            }

            // Delete if unchecked (if something else is checked)
            $deletes = array_diff($sections_checked, $exists);

            foreach ($deletes as $delete) {
                Teacher::where('DB_USER_id', $user->id)->where('DB_SECTION_id', $delete)->delete();
            }

            // Create if checked.
            $creates = array_diff($validated['DB_SECTION_MULTI_id'], $exists);

            foreach ($creates as $create) {
                Teacher::create([
                    'DB_USER_id' => $user->id,
                    'DB_SECTION_id' => $create,
                ]);
            }
        }
    }

    /*
        FUNCTION:
        On deletion:
            ...preserve the associated adviser's name (if any) on all students (if any)
    */
    public function func_preserve_STUDENT_User_on_deletion ($user) {
        // Guard
        if ($user->DB_ROLE_id != 4) {
            return;
        }

        $section = Section::where('DB_USER_id', $user->id)->first();

        if ($section == null) {
            return;
        }

        $grade = Grade::find($section->DB_GRADE_id);

        if ($grade == null) {
            return;
        }

        // Proceed
        $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();

        foreach ($students as $student) {
            $student->update([
                'LG_USER_name_last_g'.$grade->grade => $user->name_last,
                'LG_USER_name_first_g'.$grade->grade => $user->name_first,
            ]);
        }
    }

    /*
        FUNCTION:
        On deletion:
            ...preserve the associated principal's name (if any) on all school years (if any)
    */
    public function func_preserve_YEAR_User_on_deletion ($user) {
        // Guard
        if ($user->DB_ROLE_id != 1) {
            return;
        }

        // Proceed
        $years = Year::where('DB_USER_id', $user->id)->get();

        foreach ($years as $year) {
            $year->update([
                'DB_USER_id' => null,
                'LG_USER_name_last' => $user->name_last,
                'LG_USER_name_first' => $user->name_first,
            ]);
        }
    }
}