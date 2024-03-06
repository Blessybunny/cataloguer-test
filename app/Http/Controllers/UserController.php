<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;

use Request;

class UserController extends Controller {
    // RESTRICTION
    // ALLOWED: 1, 2
    public function restrict ($auth) {
        if ($auth != null) {
            if (
                $auth->DB_ROLE_id == 1 ||
                $auth->DB_ROLE_id == 2
            ) {
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

    // REDIRECT
    public function redirect () { return redirect()->to('/users'); }

    // INDEX
    // DENIED: 2
    public function index_1 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $users = User::orderBy('DB_ROLE_id', 'ASC')
            ->orderBy('name_last', 'ASC')
            ->orderBy('name_first', 'ASC')
            ->get();

        $users = self::func_format_users($users);

        // Deny (HTML)
        foreach ($users as $user) {
            $user->editable = true;

            if ($auth->DB_ROLE_id == 2) {
                if (
                    $user->DB_ROLE_id == 1 ||
                    $user->DB_ROLE_id == 2
                ) {
                    $user->editable = false;
                }
            }
        }

        // Proceed
        return view('pages.users.index')
            ->with('auth', $auth)
            ->with('users', $users);
    }
    public function index_2 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $terms = Request::get('terms');

        if (isset($terms)) {
            // Proceed
            $temp_terms = explode(' ', $terms);
            $query = User::query();

            foreach ($temp_terms as $term) {
                $query->where(function ($q) use ($term) {
                    $q->where('email', 'like', '%'.$term.'%')
                    ->orWhere('name_last', 'like', '%'.$term.'%')
                    ->orWhere('name_first', 'like', '%'.$term.'%');
                });
            }

            $results = $query->orderBy('DB_ROLE_id', 'ASC')
                ->orderBy('name_last', 'ASC')
                ->orderBy('name_first', 'ASC')
                ->get();
            $results = (count($results) > 0) ? $results : [];

            $results = self::func_format_users($results);

            // Deny (HTML)
            foreach ($results as $user) {
                $user->editable = true;

                if ($auth->DB_ROLE_id == 2) {
                    if (
                        $user->DB_ROLE_id == 1 ||
                        $user->DB_ROLE_id == 2
                    ) {
                        $user->editable = false;
                    }
                }
            }

            // Proceed
            return view('pages.users.index')
                ->with('isSearched', true)
                ->with('auth', $auth)
                ->with('terms', $terms)
                ->with('results', $results);
        }
        else {
            return self::redirect();
        }
    }

    // CREATE
    // DENIED: 2
    public function create_1 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $roles = null;

        // Deny (HTML)
        if ($auth->DB_ROLE_id == 2) {
            $roles = Role::where('id', 3)
                ->orWhere('id', 4)
                ->orWhere('id', 5)
                ->get();
        }
        else {
            $roles = Role::all();
        }

        // Proceed
        $grades = Grade::all();
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
            'password' => 'required',

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

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $user = User::find($id);

        if ($user != null) {
            $user = self::func_format_user($user);

            return view('pages.users.view')
                ->with('auth', $auth)
                ->with('user', $user);
        }
        else {
            return self::redirect();
        }
    }

    // EDIT
    // DENIED: 2
    public function edit_1 ($id) {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $user = User::find($id);

        // Deny (restrict)
        if ($auth->DB_ROLE_id == 2) {
            if (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            ) {
                return (new Controller)->home();
            }
        }

        // Proceed
        $roles = null;

        // Deny (HTML)
        if ($auth->DB_ROLE_id == 2) {
            $roles = Role::where('id', 3)
                ->orWhere('id', 4)
                ->orWhere('id', 5)
                ->get();
        }
        else {
            $roles = Role::all();
        }

        // Proceed
        if ($user != null) {
            $grades = Grade::all();
            $sections = Section::whereNotNull('section')
                ->whereNull('DB_USER_id')
                ->orWhere('DB_USER_id', $user->id)
                ->get();

            $sections = self::func_format_sections($sections);

            return view('pages.users.edit')
                ->with('auth', $auth)
                ->with('grades', $grades)
                ->with('roles', $roles)
                ->with('sections', $sections)
                ->with('user', $user);
        }
        else {
            return self::redirect();
        }
    }
    public function edit_2 ($id) {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $user = User::find($id);

        if ($user != null) {
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
        else {
            return self::redirect();
        }
    }

    // DELETE
    // DENIED: 2
    public function delete_1 ($id) {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $user = User::find($id);

        // Deny (restrict)
        if ($auth->DB_ROLE_id == 2) {
            if (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            ) {
                return (new Controller)->home();
            }
        }

        // Proceed
        if ($user != null) {
            return view('pages.users.delete')
                ->with('auth', $auth)
                ->with('user', $user);
        }
        else {
            return self::redirect();
        }
    }
    public function delete_2 ($id) {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $user = User::find($id);

        // Deny (restrict)
        if ($auth->DB_ROLE_id == 2) {
            if (
                $user->DB_ROLE_id == 1 ||
                $user->DB_ROLE_id == 2
            ) {
                return (new Controller)->home();
            }
        }

        // Proceed
        if ($user != null) {
            self::func_delete_preserve_STUDENT_User_on_deletion($user);
            self::func_preserve_YEAR_User_on_deletion($user);

            self::func_section_unassign($user);

            $user->delete();
        }

        return self::redirect();
    }

    // FUNCTION: format user (multiple)
    // index_1, index_2
    public function func_format_users ($users) {
        foreach ($users as $user) {
            // Role
            $role = Role::find($user->DB_ROLE_id);

            if ($role != null) {
                $user->role = $role->role;
            }

            // Designation - grade level coordinator
            // Designation - teacher
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
        }

        // Return
        return $users;
    }

    // FUNCTION: format user (single)
    // view
    public function func_format_user ($user) {
        // Role
        $role = Role::find($user->DB_ROLE_id);

        if ($role != null) {
            $user->role = $role->role;
        }

        // Designation - grade level coordinator
        // Designation - teacher
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

        // Return
        return $user;
    }

    // FUNCTION: format section (multiple)
    // create_1, edit_1
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
    // create_2, edit_2
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
    // edit_2
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
    // edit_2
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
    // edit_2
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
    // edit_2
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
    // edit_2
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
    // delete_2
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
    // delete_2
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