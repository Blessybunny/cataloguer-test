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
    // Redirect
    public function redirect () { return redirect()->to('/users'); }

    // 1.1 - Index (GET)
    // From the index page, display info
    public function index_1 () {
        $users = User::orderBy('DB_ROLE_id', 'ASC')
            ->orderBy('name_last', 'ASC')
            ->orderBy('name_first', 'ASC')
            ->get();

        $users = self::func_index_make_info($users);

        return view('pages.users.index')->with('users', $users);
    }

    // 1.2 - Index (POST)
    // From the index page, display info from the search
    public function index_2 () {
        $terms = Request::get('terms');

        if (isset($terms)) {
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

            $results = self::func_index_make_info($results);

            return view('pages.users.index')
                ->with('isSearched', true)
                ->with('terms', $terms)
                ->with('results', $results);
        }
        else return redirect()->to('/users');
    }

    // 2.1 - Create (GET)
    // From the create page, display the fields
    public function create_1 () {
        $grades = Grade::all();
        $roles = Role::all();
        $sections = Section::whereNotNull('section')
            ->whereNull('DB_USER_id')
            ->get();

        foreach ($sections as $section) {
            $grade = Grade::find($section->DB_GRADE_id);

            if ($grade != null) {
                $section->grade = $grade->grade;
            }
        }

        return view('pages.users.create')
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections);
    }

    // 2.2 - Create (POST)
    // From the create page, create the fields
    public function create_2 () {
        $validate = request()->validate([
            'DB_ROLE_id' => 'required',
            'DB_GRADE_id' => 'nullable',
            'DB_SECTION_id' => 'nullable',

            'email' => 'required|unique:users,email',
            'password' => 'required',

            'name_last' => 'required',
            'name_first' => 'required',
        ]);

        $validate = self::func_credit_validate_role($validate);

        $user = User::create([
            'DB_ROLE_id' => $validate['DB_ROLE_id'],
            'DB_GRADE_id' => $validate['DB_GRADE_id'],
            'DB_SECTION_id' => $validate['DB_SECTION_id'],

            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),

            'name_last' => $validate['name_last'],
            'name_first' => $validate['name_first'],
        ]);

        return redirect()->to('/users');
    }

    // 3.1 - Edit (GET)
    // From the edit page, display the fields
    public function edit_1 ($id) {
        $grades = Grade::all();
        $roles = Role::all();
        $user = User::find($id);
        $sections = Section::whereNotNull('section')
            ->whereNull('DB_USER_id')
            ->orWhere('DB_USER_id', $user->id)
            ->get();

        foreach ($sections as $section) {
            $grade = Grade::find($section->DB_GRADE_id);

            if ($grade != null) {
                $section->grade = $grade->grade;
            }
        }

        return view('pages.users.edit')
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections)
            ->with('user', $user);
    }

    // 3.2 - Edit (POST)
    // From the edit page, update the fields
    public function edit_2 ($id) {
        $user = User::find($id);

        $validate = request()->validate([
            'DB_ROLE_id' => 'required',
            'DB_GRADE_id' => 'nullable',
            'DB_SECTION_id' => 'nullable',

            'name_last' => 'required',
            'name_first' => 'required',
        ]);

        $user_old = clone $user;

        $validate = self::func_credit_validate_role($validate);

        $user->update([
            'DB_ROLE_id' => $validate['DB_ROLE_id'],
            'DB_GRADE_id' => $validate['DB_GRADE_id'],
            'DB_SECTION_id' => $validate['DB_SECTION_id'],

            'name_last' => $validate['name_last'],
            'name_first' => $validate['name_first'],
        ]);

        self::func_edit_preserve_STUDENT_User_on_role_change($user, $user_old);
        self::func_edit_preserve_STUDENT_User_on_section_change($user, $user_old);
        self::func_edit_preserve_YEAR_User_on_role_change($user, $user_old);

        self::func_edit_section_unassign($user);
        self::func_edit_section_assign($user);

        return redirect()->to('/users/edit/'.$id);
    }

    // 4.1 - Delete (GET)
    // From the delete page, display info
    public function delete_1 ($id) {
        $user = User::find($id);

        return view('pages.users.delete')->with('user', $user);
    }

    // 4.2 - Delete (POST)
    // From the delete page, delete the fields
    public function delete_2 ($id) {
        $user = User::find($id);

        self::func_delete_preserve_STUDENT_User_on_deletion($user);
        self::func_delete_preserve_YEAR_User_on_deletion($user);

        self::func_edit_section_unassign($user);

        $user->delete();

        return redirect()->to('/users');
    }

    // Functions
    // From the index page, make info
    public function func_index_make_info ($param) {
        foreach ($param as $user) {
            $role = Role::find($user->DB_ROLE_id);

            if ($role != null) {
                $user->role = $role->role;
            }

            if ($user->DB_ROLE_id == '1' || $user->DB_ROLE_id == '2') {
                $user->advisory = 'N/A';
            }
            else if ($user->DB_ROLE_id == '3') {
                $grade = Grade::find($user->DB_GRADE_id);

                if ($grade != null) {
                    $user->advisory = 'Grade '.$grade->grade;
                }
                else {
                    $user->advisory = 'N/A';
                }
            }
            else if ($user->DB_ROLE_id == '4' || $user->DB_ROLE_id == '5') {
                $section = Section::find($user->DB_SECTION_id);

                if ($section != null) {
                    $grade = Grade::find($section->DB_GRADE_id);
                    
                    if ($grade != null) {
                        $user->advisory = 'Grade '.$grade->grade.' - '.$section->section;
                    }
                    else {
                        $user->advisory = 'N/A';
                    }
                }
                else {
                    $user->advisory = 'N/A';
                }
            }
        }

        return $param;
    }

    // From the create + edit page, validate roles to manage advisory grades and sections
    public function func_credit_validate_role ($validate) {
        if ($validate['DB_ROLE_id'] == '1' || $validate['DB_ROLE_id'] == '2') {
            $validate['DB_GRADE_id'] = null;
            $validate['DB_SECTION_id'] = null;
        }
        else if ($validate['DB_ROLE_id'] == '3') {
            $validate['DB_SECTION_id'] = null;
        }
        else if ($validate['DB_ROLE_id'] == '4' || $validate['DB_ROLE_id'] == '5') {
            $validate['DB_GRADE_id'] = null;
        }

        return $validate;
    }

    // From the edit page, preserve the adviser's name to the assigned section's students on role change
    public function func_edit_preserve_STUDENT_User_on_role_change ($user, $user_old) {
        if ($user_old->DB_ROLE_id == '4') {
            if ($user_old->DB_ROLE_id != $user->DB_ROLE_id) {
                $sections = Section::where('DB_USER_id', $user->id)->get();

                foreach ($sections as $section) {
                    $grade = Grade::find($section->DB_GRADE_id);

                    if ($grade != null) {
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
        }
    }

    // From the edit page, preserve the adviser's name to the assigned section's students on section change
    public function func_edit_preserve_STUDENT_User_on_section_change ($user, $user_old) {
        if ($user_old->DB_ROLE_id == '4') {
            if ($user_old->DB_SECTION_id != $user->DB_SECTION_id) {
                $sections = Section::where('DB_USER_id', $user->id)->get();

                foreach ($sections as $section) {
                    $grade = Grade::find($section->DB_GRADE_id);

                    if ($grade != null) {
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
        }
    }

    // From the edit page, preserve the principal's name to the assigned school year on role change
    public function func_edit_preserve_YEAR_User_on_role_change ($user, $user_old) {
        if ($user_old->DB_ROLE_id == '1') {
            if ($user_old->DB_ROLE_id != $user->DB_ROLE_id) {
                $years = Year::where('DB_USER_id', $user->id)->get();

                foreach ($years as $year) {
                    $year->update([
                        'DB_USER_id' => null,

                        'PRESERVE_DB_USER_name_last' => $user->name_last,
                        'PRESERVE_DB_USER_name_first' => $user->name_first,
                    ]);
                }
            }
        }
    }

    // From the edit page, unassign the user from a section on section or role change
    public function func_edit_section_unassign ($user) {
        $sections = Section::where('DB_USER_id', $user->id)->get();

        foreach ($sections as $section) {
            if ($section != null) {
                $section->update(['DB_USER_id' => null]);
            }
        }
    }

    // From the edit page, assign the adviser to a section and clear the adviser name preserves of the assigned section's students
    public function func_edit_section_assign ($user) {
        if ($user->DB_ROLE_id == '4') {
            $section = Section::find($user->DB_SECTION_id);

            if ($section != null) {
                $section->update(['DB_USER_id' => $user->id]);

                $grade = Grade::find($section->DB_GRADE_id);

                if ($grade != null) {
                    $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();
                    
                    foreach ($students as $student) {
                        $student->update([
                            'PRESERVE_DB_USER_name_last_g'.$grade->grade => null,
                            'PRESERVE_DB_USER_name_first_g'.$grade->grade => null,
                        ]);
                    }
                }
            }
        }
    }

    // From the delete page, preserve the adviser's name to the assigned section's students on deletion
    public function func_delete_preserve_STUDENT_User_on_deletion ($user) {
        $sections = Section::where('DB_USER_id', $user->id)->get();

        foreach ($sections as $section) {
            $grade = Grade::find($section->DB_GRADE_id);

            if ($grade != null) {
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

    // From the delete page, preserve the principal's name to the assigned school year on deletion
    public function func_delete_preserve_YEAR_User_on_deletion ($user) {
        $years = Year::where('DB_USER_id', $user->id)->get();

        foreach ($years as $year) {
            $year->update([
                'DB_USER_id' => null,

                'PRESERVE_DB_USER_name_last' => $user->name_last,
                'PRESERVE_DB_USER_name_first' => $user->name_first,
            ]);
        }
    }
}