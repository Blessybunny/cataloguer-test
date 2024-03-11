<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;

use Request;

// Do-not-touch
// Whitespace-checked
// Restriction-checked

class UserController extends Controller {
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
    public function redirect () { return redirect()->to('/users'); }

    // INDEX
    public function index () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
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
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();
        $roles = self::func_format_roles($auth, Role::query());
        $sections = Section::whereNotNull('section')
            ->whereNull('DB_USER_id')
            ->get();

        $sections = self::func_format_sections($sections);

        return view('pages.users.create')
            ->with('auth', $auth)
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections);
    }
    public function create_2 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $validate = request()->validate([
            'DB_ROLE_id' => 'required',
            'DB_GRADE_id' => 'nullable',
            'DB_SECTION_id' => 'nullable',

            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',

            'name_last' => 'required',
            'name_first' => 'required',
        ]);

        $validate = self::func_validate_role($validate);

        $user = User::create([
            'DB_ROLE_id' => $validate['DB_ROLE_id'],
            'DB_GRADE_id' => $validate['DB_GRADE_id'],
            'DB_SECTION_id' => $validate['DB_SECTION_id'],

            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),

            'name_last' => $validate['name_last'],
            'name_first' => $validate['name_first'],
        ]);

        return self::redirect();
    }

    // VIEW
    public function view ($id) {
        // Restrict
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::restrict($auth) ||
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
        // Proceed
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::restrict($auth) ||
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

        $sections = self::func_format_sections($sections);

        $user->is_logged_out = Auth::id() != $user->id;

        return view('pages.users.edit')
            ->with('auth', $auth)
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections)
            ->with('user', $user);
    }
    public function edit_2 ($id) {
        // Proceed
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::restrict($auth) ||
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
        $validate = request()->validate([
            'DB_ROLE_id' => 'required',
            'DB_GRADE_id' => 'nullable',
            'DB_SECTION_id' => 'nullable',

            'name_last' => 'required',
            'name_first' => 'required',
        ]);

        $user_old = clone $user;

        $validate = self::func_validate_role($validate);

        $user->update([
            'DB_ROLE_id' => $validate['DB_ROLE_id'],
            'DB_GRADE_id' => $validate['DB_GRADE_id'],
            'DB_SECTION_id' => $validate['DB_SECTION_id'],

            'name_last' => $validate['name_last'],
            'name_first' => $validate['name_first'],
        ]);

        self::func_preserve_STUDENT_User_on_role_change($user, $user_old);
        self::func_preserve_STUDENT_User_on_section_change($user, $user_old);
        self::func_preserve_YEAR_User_on_role_change($user, $user_old);

        self::func_section_unassign($user);
        self::func_section_reassign($user);

        return redirect()->to('/users/edit/'.$id);
    }

    // PASSWORD
    public function password_1 ($id) {
        // Proceed
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::restrict($auth) ||
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
        // Proceed
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::restrict($auth) ||
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
        $validate = request()->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $user->update([
            'password' => bcrypt($validate['password']),
        ]);

        return redirect()->to('/users/edit/'.$id);
    }

    // DELETE
    public function delete_1 ($id) {
        // Proceed
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::restrict($auth) ||
            $user == null ||
            $auth->is_administrator &&
            (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            ) ||
            Auth::id() == $user->id // If logged in
        ) {
            return (new Controller)->home();
        }

        // Proceed
        return view('pages.users.delete')
            ->with('auth', $auth)
            ->with('user', $user);
    }
    public function delete_2 ($id) {
        // Proceed
        $auth = (new Controller)->auth();
        $user = User::find($id);

        if (
            self::restrict($auth) ||
            $user == null ||
            $auth->is_administrator &&
            (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            ) ||
            Auth::id() == $user->id // If logged in
        ) {
            return (new Controller)->home();
        }

        // Proceed
        self::func_delete_preserve_STUDENT_User_on_deletion($user);
        self::func_preserve_YEAR_User_on_deletion($user);

        self::func_section_unassign($user);

        $user->delete();

        return self::redirect();
    }

    // FUNCTION: format user (multiple)
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

    // FUNCTION: format user (single)
    public function func_format_user ($auth, $user) {
        // Role
        $role = Role::find($user->DB_ROLE_id);

        if ($role != null) {
            $user->role = $role->role;
        }

        // Designation - grade level coordinator and teacher
        if (
            $user->DB_ROLE_id == 3 ||
            $user->DB_ROLE_id == 5
        ) {
            $grade = Grade::find($user->DB_GRADE_id);

            if ($grade != null) {
                $user->designation = 'Grade '.$grade->grade;
            }
        }

        // Designation - adviser
        if ($user->DB_ROLE_id == 4) {
            $section = Section::find($user->DB_SECTION_id);

            if ($section != null) {
                $grade = Grade::find($section->DB_GRADE_id);
                
                if ($grade != null) {
                    $user->designation = 'Grade '.$grade->grade.' | '.$section->section;
                }
            }
        }

        // Year

        // Editability
        if (
            $auth->is_administrator &&
            (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            )
        ) {
            $user->editable = false;
        }
        else {
            $user->editable = true;
        }

        // Return
        return $user;
    }

    // FUNCTION: format role (multiple)
    public function func_format_roles ($auth, $roles) {
        if ($auth->is_administrator) {
            return $roles->where('id', 3)
                ->orWhere('id', 4)
                ->orWhere('id', 5)
                ->get();
        }
        else {
            return $roles->get();
        }
    }

    // FUNCTION: format section (multiple)
    public function func_format_sections ($sections) {
        foreach ($sections as $section) {
            $grade = Grade::find($section->DB_GRADE_id);

            if ($grade != null) {
                $section->grade = $grade->grade;
            }
        }

        return $sections;
    } 

    // FUNCTION: validate role
    public function func_validate_role ($validate) {
        if (
            $validate['DB_ROLE_id'] == '1' ||
            $validate['DB_ROLE_id'] == '2'
        ) {
            $validate['DB_GRADE_id'] = null;
            $validate['DB_SECTION_id'] = null;
            // Year ID = null;
        }
        else if (
            $validate['DB_ROLE_id'] == '3' ||
            $validate['DB_ROLE_id'] == '5'
        ) {
            $validate['DB_SECTION_id'] = null;
        }
        else if ($validate['DB_ROLE_id'] == '4') {
            $validate['DB_GRADE_id'] = null;
        }

        return $validate;
    }

    // FUNCTION: apply user preserves from all students with the user's section ID on role change (adviser)
    public function func_preserve_STUDENT_User_on_role_change ($user, $user_old) {
        if ($user_old->DB_ROLE_id == 4) {
            if ($user_old->DB_ROLE_id != $user->DB_ROLE_id) {
                $sections = Section::where('DB_USER_id', $user->id)->get();

                foreach ($sections as $section) {
                    $grade = Grade::find($section->DB_GRADE_id);

                    if ($grade != null) {
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
        }
    }

    // FUNCTION: apply user preserves from all students with the user's section ID on section change (adviser)
    public function func_preserve_STUDENT_User_on_section_change ($user, $user_old) {
        if ($user_old->DB_ROLE_id == 4) {
            if ($user_old->DB_SECTION_id != $user->DB_SECTION_id) {
                $sections = Section::where('DB_USER_id', $user->id)->get();

                foreach ($sections as $section) {
                    $grade = Grade::find($section->DB_GRADE_id);

                    if ($grade != null) {
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
        }
    }

    // FUNCTION: apply user preserves from all years with the user's ID on role change (principal)
    public function func_preserve_YEAR_User_on_role_change ($user, $user_old) {
        if ($user_old->DB_ROLE_id == 1) {
            if ($user_old->DB_ROLE_id != $user->DB_ROLE_id) {
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
    }

    // FUNCTION: find sections with the user's ID and erase those sections' user IDs
    public function func_section_unassign ($user) {
        $sections = Section::where('DB_USER_id', $user->id)->get();

        foreach ($sections as $section) {
            if ($section != null) {
                $section->update(['DB_USER_id' => null]);
            }
        }
    }

    // FUNCTION: find a section with the user's ID and update that section's user ID with the user's ID (adviser)
    // FUNCTION: erase user preserves from all students with the user's section ID (adviser)
    public function func_section_reassign ($user) {
        if ($user->DB_ROLE_id == 4) {
            $section = Section::find($user->DB_SECTION_id);

            if ($section != null) {
                $section->update(['DB_USER_id' => $user->id]);

                $grade = Grade::find($section->DB_GRADE_id);

                if ($grade != null) {
                    $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();

                    foreach ($students as $student) {
                        $student->update([
                            'LG_USER_name_last_g'.$grade->grade => null,
                            'LG_USER_name_first_g'.$grade->grade => null,
                        ]);
                    }
                }
            }
        }
    }

    // FUNCTION: apply user preserves from all students with the user's section ID on deletion (adviser)
    public function func_delete_preserve_STUDENT_User_on_deletion ($user) {
        $sections = Section::where('DB_USER_id', $user->id)->get();

        foreach ($sections as $section) {
            $grade = Grade::find($section->DB_GRADE_id);

            if ($grade != null) {
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

    // FUNCTION: apply user preserves from all years with the user's ID on deletion (principal)
    public function func_preserve_YEAR_User_on_deletion ($user) {
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