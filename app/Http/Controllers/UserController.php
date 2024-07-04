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

class UserController extends Controller {
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
        $terms = Request::get('terms');
        $search = explode(' ', $terms);
        $users = User::query();

        foreach ($search as $term) {
            $users->where(function ($q) use ($term) {
                $q->where('name_last', 'like', '%'.$term.'%')
                ->orWhere('name_first', 'like', '%'.$term.'%');
            });
        }

        $users = self::Format_Users($users);

        return view('pages.users.index')
            ->with('auth', $auth)
            ->with('terms', $terms)
            ->with('users', $users);
    }

    /**
     * VIEW
     */
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
        $students = self::Format_Students($user, Student::query());
        $user = self::Format_User($user);

        return view('pages.users.view')
            ->with('auth', $auth)
            ->with('students', $students)
            ->with('user', $user);
    }

    /**
     * CREATE
     */
    public function create_1 () {
        // Guard
        $auth = (new Controller)->auth();

        if (
            self::guard($auth) ||
            $auth->is_principal
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();
        $roles = Role::all();
        $sections = self::Format_Sections(Section::query());
        $years = Year::all();

        return view('pages.users.create')
            ->with('auth', $auth)
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections)
            ->with('years', $years);
    }
    public function create_2 () {
        // Guard
        $auth = (new Controller)->auth();

        if (
            self::guard($auth) ||
            $auth->is_principal
        ) {
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

            'ST_subject_fil' => 'nullable',
            'ST_subject_eng' => 'nullable',
            'ST_subject_mat' => 'nullable',
            'ST_subject_sci' => 'nullable',
            'ST_subject_ap' => 'nullable',
            'ST_subject_ep' => 'nullable',
            'ST_subject_tle' => 'nullable',
            'ST_subject_mapeh' => 'nullable',
            'ST_subject_jp' => 'nullable',

            'ST_subject_sf10_acads' => 'nullable',
            'ST_subject_sf10_grade' => 'nullable',
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

            'ST_subject_fil' => isset($validated['ST_subject_fil']) ? 1 : 0,
            'ST_subject_eng' => isset($validated['ST_subject_eng']) ? 1 : 0,
            'ST_subject_mat' => isset($validated['ST_subject_mat']) ? 1 : 0,
            'ST_subject_sci' => isset($validated['ST_subject_sci']) ? 1 : 0,
            'ST_subject_ap' => isset($validated['ST_subject_ap']) ? 1 : 0,
            'ST_subject_ep' => isset($validated['ST_subject_ep']) ? 1 : 0,
            'ST_subject_tle' => isset($validated['ST_subject_tle']) ? 1 : 0,
            'ST_subject_mapeh' => isset($validated['ST_subject_mapeh']) ? 1 : 0,
            'ST_subject_jp' => isset($validated['ST_subject_jp']) ? 1 : 0,

            'ST_subject_sf10_acads' => isset($validated['ST_subject_sf10_acads']) ? 1 : 0,
            'ST_subject_sf10_grade' => isset($validated['ST_subject_sf10_grade']) ? 1 : 0,
        ]);

        self::func_designation_clear_section($user);
        self::func_designation_clear_classes($user);
        self::func_designation_section($user);
        self::func_designation_classes($user);

        return redirect()->to('/users/edit/'.$user->id)
            ->with('created', true);
    }

    /**
     * EDIT
     */
    public function edit_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $user == null
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();
        $roles = Role::all();
        $sections = self::Format_Sections_Classes(Section::query(), $user);
        $years = Year::all();

        // Temp debug, 7/5/2024
        //$user->is_deletable = strtotime($user->updated_at) < strtotime('-1 day');
        $user->is_deletable = false

        return view('pages.users.edit')
            ->with('auth', $auth)
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections)
            ->with('user', $user)
            ->with('years', $years);
    }
    public function edit_2 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $user == null
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $user_old = clone $user;

        $validated = request()->validate([
            'DB_GRADE_id' => 'nullable',
            'DB_ROLE_id' => 'required',
            'DB_YEAR_id' => 'nullable',

            'name_last' => 'required',
            'name_first' => 'required',

            'ST_subject_fil' => 'nullable',
            'ST_subject_eng' => 'nullable',
            'ST_subject_mat' => 'nullable',
            'ST_subject_sci' => 'nullable',
            'ST_subject_ap' => 'nullable',
            'ST_subject_ep' => 'nullable',
            'ST_subject_tle' => 'nullable',
            'ST_subject_mapeh' => 'nullable',
            'ST_subject_jp' => 'nullable',

            'ST_subject_sf10_acads' => 'nullable',
            'ST_subject_sf10_grade' => 'nullable',
        ]);

        $validated = self::func_validate_role($validated);

        $user->update([
            'DB_GRADE_id' => $validated['DB_GRADE_id'],
            'DB_ROLE_id' => $validated['DB_ROLE_id'],
            'DB_YEAR_id' => $validated['DB_YEAR_id'],

            'name_last' => $validated['name_last'],
            'name_first' => $validated['name_first'],

            'ST_subject_fil' => isset($validated['ST_subject_fil']) ? 1 : 0,
            'ST_subject_eng' => isset($validated['ST_subject_eng']) ? 1 : 0,
            'ST_subject_mat' => isset($validated['ST_subject_mat']) ? 1 : 0,
            'ST_subject_sci' => isset($validated['ST_subject_sci']) ? 1 : 0,
            'ST_subject_ap' => isset($validated['ST_subject_ap']) ? 1 : 0,
            'ST_subject_ep' => isset($validated['ST_subject_ep']) ? 1 : 0,
            'ST_subject_tle' => isset($validated['ST_subject_tle']) ? 1 : 0,
            'ST_subject_mapeh' => isset($validated['ST_subject_mapeh']) ? 1 : 0,
            'ST_subject_jp' => isset($validated['ST_subject_jp']) ? 1 : 0,

            'ST_subject_sf10_acads' => isset($validated['ST_subject_sf10_acads']) ? 1 : 0,
            'ST_subject_sf10_grade' => isset($validated['ST_subject_sf10_grade']) ? 1 : 0,
        ]);

        $user->touch();

        self::func_STUDENT_User_on_role_change($user, $user_old);
        self::func_STUDENT_User_on_section_change($user, $user_old);
        self::func_YEAR_User_on_role_change($user, $user_old);

        self::func_designation_clear_section($user);
        self::func_designation_clear_classes($user);
        self::func_designation_section($user);
        self::func_designation_classes($user);

        return redirect()->to('/users/edit/'.$id)
            ->with('updated', true);
    }

    /**
     * PASSWORD
     */
    public function password_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $user == null
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
            $auth->is_principal ||
            $user == null
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

        return redirect()->to('/users/password/'.$id)
            ->with('updated', true);
    }

    /**
     * DELETE
     */
    public function delete_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $user == null ||
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
            $auth->is_principal ||
            $user == null ||
            !(strtotime($user->updated_at) < strtotime('-1 day'))
        ) {
            return (new Controller)->home();
        }

        // Proceed
        self::func_STUDENT_User_on_deletion($user);
        self::func_YEAR_User_on_deletion($user);

        self::func_designation_clear_section($user);
        self::func_designation_clear_classes($user);

        $user->delete();

        return redirect()->to('/users');
    }

    // ----------------------------------------------------------------------------------------------------

    /**
     * FUNCTION: format student (many) [BORROWED CODE: see StudentController.php]
     */
    public function Format_Students ($user, $students) {
        // Order
        $students = $students
            ->orderBy('info_name_last', 'ASC')
            ->orderBy('info_name_first', 'ASC')
            ->orderBy('info_name_middle', 'ASC')
            ->orderBy('info_name_suffix', 'ASC');
        
        // Principal / Administrator
        if ($user->DB_ROLE_id == '1' || $user->DB_ROLE_id == '2') {
            $students->where('id', -1);
        }

        // Grade Level Coordinator
        if ($user->DB_ROLE_id == '3') {
            $grade = Grade::find($user->DB_GRADE_id);

            // Grab something if both the designated school year and grade level are defined
            if ($user->DB_YEAR_id != null && $grade != null) {
                $students = $students
                    ->whereNotNull('DB_SECTION_id_g'.$grade->grade)
                    ->whereNotNull('DB_YEAR_id_g'.$grade->grade)
                    ->where('DB_YEAR_id_g'.$grade->grade, $user->DB_YEAR_id);
            }
            else {
                $students = $students->where('id', -1);
            }
        }

        // Adviser
        if ($user->DB_ROLE_id == '4') {
            $classes = Teacher::where('DB_USER_id', $user->id)->pluck('DB_SECTION_id')->toArray();

            // Grab something if both the designated school year and classes are defined
            if ($user->DB_YEAR_id != null && count($classes) > 0) {
                $students = $students
                    ->where(function ($query) use ($user, $classes) {
                        $query->whereNotNull('DB_SECTION_id_g7')
                            ->whereNotNull('DB_YEAR_id_g7')
                            ->whereIn('DB_SECTION_id_g7', $classes)
                            ->where('DB_YEAR_id_g7', $user->DB_YEAR_id);
                    })
                    ->orWhere(function($query) use ($user, $classes) {
                        $query->whereNotNull('DB_SECTION_id_g8')
                            ->whereNotNull('DB_YEAR_id_g8')
                            ->whereIn('DB_SECTION_id_g8', $classes)
                            ->where('DB_YEAR_id_g8', $user->DB_YEAR_id);
                    })
                    ->orWhere(function($query) use ($user, $classes) {
                        $query->whereNotNull('DB_SECTION_id_g9')
                            ->whereNotNull('DB_YEAR_id_g9')
                            ->whereIn('DB_SECTION_id_g9', $classes)
                            ->where('DB_YEAR_id_g9', $user->DB_YEAR_id);
                    })
                    ->orWhere(function($query) use ($user, $classes) {
                        $query->whereNotNull('DB_SECTION_id_g10')
                            ->whereNotNull('DB_YEAR_id_g10')
                            ->whereIn('DB_SECTION_id_g10', $classes)
                            ->where('DB_YEAR_id_g10', $user->DB_YEAR_id);
                    });
            }
            else {
                $students = $students->where('id', -1);
            }
        }

        // Get
        $students = $students->get();

        // Section
        $grades = Grade::all();

        foreach ($students as $student) {
            do {
                foreach ($grades as $grade) {
                    if ($student->{'DB_YEAR_id_g'.$grade->grade} == $user->DB_YEAR_id) {
                        $student->section = Section::find($student->{'DB_SECTION_id_g'.$grade->grade});

                        if ($student->section != null) {
                            $student->grade = Grade::find($student->section->DB_GRADE_id)->grade;
                            $student->section = $student->section->section;
                        }

                        break;
                    }
                }
            }
            while (false);
        }

        // Return
        return $students;
    }

    /**
     * FUNCTION: format user (one)
     */
    public function Format_User ($user) {
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

        // Subject Designations

        // Grade Level Coordinator's Designation
        $grade = Grade::find($user->DB_GRADE_id);

        if ($grade != null) {
            $user->grade = 'Grade '.$grade->grade;
        }

        // Adviser's Designation
        $section = Section::where('DB_USER_id', $user->id)->first();

        if ($section != null) {
            $grade = Grade::find($section->DB_GRADE_id);
            
            if ($grade != null) {
                $user->section = 'Grade '.$grade->grade.' | '.$section->section;
            }
        }

        // Class Designations
        $user->classes = Teacher::where('DB_USER_id', $user->id)->get();

        foreach ($user->classes as $class => $value) {
            $user->classes[$class] = Section::find($value->DB_SECTION_id);

            $grade = Grade::find($user->classes[$class]->DB_GRADE_id);

            if ($grade != null) {
                $user->classes[$class]->grade = $grade->grade;
            }
        }

        // Return
        return $user;
    }

    /**
     * FUNCTION: format user (many)
     */
    public function Format_Users ($users) {
        // Order
        $users = $users->orderBy('DB_ROLE_id', 'ASC')
            ->orderBy('name_last', 'ASC')
            ->orderBy('name_first', 'ASC')
            ->paginate(100);

        // Format
        foreach ($users as $user) {
            $user = self::Format_User($user);
        }

        // Return
        return $users;
    }

    /**
     * FUNCTION: format section (many)
     */
    public function Format_Sections ($sections) {
        $sections = Section::whereNotNull('section')->get();

        foreach ($sections as $section) {
            $grade = Grade::find($section->DB_GRADE_id);

            if ($grade != null) {
                $section->grade = $grade->grade;
            }
        }

        return $sections;
    }
    public function Format_Sections_Classes ($sections, $user) {
        $sections = Section::whereNotNull('section')->get();

        foreach ($sections as $section) {
            $grade = Grade::find($section->DB_GRADE_id);

            if ($grade != null) {
                $section->grade = $grade->grade;
            }

            $section->is_classed = Teacher::where('DB_SECTION_ID', $section->id)->where('DB_USER_id', $user->id)->exists();
        }

        return $sections;
    }

    /**
     * FUNCTION: validate role
     */
    public function func_validate_role ($validated) {
        if (
            $validated['DB_ROLE_id'] == '1' ||
            $validated['DB_ROLE_id'] == '2'
        ) {
            $validated['DB_GRADE_id'] = null;
            $validated['DB_SECTION_id'] = null;
            $validated['DB_YEAR_id'] = null;

            $validated['ST_subject_fil'] = null;
            $validated['ST_subject_eng'] = null;
            $validated['ST_subject_mat'] = null;
            $validated['ST_subject_sci'] = null;
            $validated['ST_subject_ap'] = null;
            $validated['ST_subject_ep'] = null;
            $validated['ST_subject_tle'] = null;
            $validated['ST_subject_mapeh'] = null;
            $validated['ST_subject_jp'] = null;

            $validated['ST_subject_sf10_acads'] = null;
            $validated['ST_subject_sf10_grade'] = null;
        }
        else if ($validated['DB_ROLE_id'] == '3') {
            $validated['DB_SECTION_id'] = null;
        }
        else if ($validated['DB_ROLE_id'] == '4') {
            $validated['DB_GRADE_id'] = null;
        }

        return $validated;
    }

    /**
     * FUNCTION: on edit
     *      STUDENT -> keep the user name
     */
    public function func_STUDENT_User_on_role_change ($user, $user_old) {
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

    /**
     * FUNCTION: on edit
     *      STUDENT -> keep the user name
     */
    public function func_STUDENT_User_on_section_change ($user, $user_old) {
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

    /**
     * FUNCTION: on edit
     *      YEAR -> wipe the user ID
     *      YEAR -> keep the user name
     */
    public function func_YEAR_User_on_role_change ($user, $user_old) {
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

    /**
     * FUNCTION: on create / delete / edit
     *      SECTION -> wipe the user ID
     *      TEACHER -> delete with user ID
     */
    public function func_designation_clear_section ($user) {
        $section = Section::where('DB_USER_id', $user->id)->first();

        if ($section != null) {
            $section->update(['DB_USER_id' => null]);
        }
    }
    public function func_designation_clear_classes ($user) {
        Teacher::where('DB_USER_id', $user->id)->delete();
    }

    /**
     * FUNCTION: on create / edit
     *      SECTION -> set the user ID
     *      STUDENT -> wipe the user name
     */
    public function func_designation_section ($user) {
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

    /**
     * FUNCTION: on create / edit
     *      TEACHER -> manage CRUD
     */
    public function func_designation_classes ($user) {
        // Guard
        if ($user->DB_ROLE_id != 4) {
            return;
        }

        // Proceed
        $sections = Teacher::where('DB_USER_id', $user->id)->get();
        $sections_checked = array();

        foreach ($sections as $section) {
            array_push($sections_checked, $section->DB_SECTION_id);
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

            // Create if checked
            $creates = array_diff($validated['DB_SECTION_MULTI_id'], $exists);

            foreach ($creates as $create) {
                Teacher::create([
                    'DB_USER_id' => $user->id,
                    'DB_SECTION_id' => $create,
                ]);
            }
        }
    }

    /**
     * FUNCTION: on delete
     *      STUDENT -> keep the user name
     */
    public function func_STUDENT_User_on_deletion ($user) {
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

    /**
     * FUNCTION: on delete
     *      YEAR -> wipe the user ID
     *      YEAR -> keep the user name
     */
    public function func_YEAR_User_on_deletion ($user) {
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