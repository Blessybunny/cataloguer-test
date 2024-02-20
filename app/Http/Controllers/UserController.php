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

    // Index (GET)
    public function index_1 () {
        $users = User::orderBy('DB_ROLE_id', 'ASC')
            ->orderBy('name_last', 'ASC')
            ->orderBy('name_first', 'ASC')
            ->get();
        $users = self::func_make_index_info($users);

        return view('pages.users.index')->with('users', $users);
    }

    // Index (POST)
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
            $results = self::func_make_index_info($results);

            return view('pages.users.index')
                ->with('isSearched', true)
                ->with('terms', $terms)
                ->with('results', $results);
        }
        else return redirect()->to('/users');
    }

    // Create (GET)
    public function create_1 () {
        $grades = Grade::all();
        $roles = Role::all();
        $sections = Section::whereNotNull('section')->get();

        foreach ($sections as $section) {
            $section->grade = Grade::find($section->DB_GRADE_id)->grade;
        }

        return view('pages.users.create')
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections);
    }

    // Create (POST)
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

        self::func_preserve_STUDENT_Section_on_role_change($user);
        self::func_preserve_STUDENT_Section_on_section_change($user);
        self::func_preserve_YEAR_User_on_role_change($user);

        self::func_section_unassign($user);
        self::func_section_assign($user);

        return redirect()->to('/users');
    }

    // Edit (GET)
    public function edit_1 ($id) {
        $grades = Grade::all();
        $roles = Role::all();
        $sections = Section::whereNotNull('section')->get();
        $user = User::find($id);

        foreach ($sections as $section) {
            $section->grade = Grade::find($section->DB_GRADE_id)->grade;
        }

        return view('pages.users.edit')
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections)
            ->with('user', $user);
    }

    // Edit (POST)
    public function edit_2 ($id) {
        $user = User::find($id);

        $validate = request()->validate([
            'DB_ROLE_id' => 'required',
            'DB_GRADE_id' => 'nullable',
            'DB_SECTION_id' => 'nullable',

            'name_last' => 'required',
            'name_first' => 'required',
        ]);

        $validate = self::func_validate_role($validate);

        $user->update([
            'DB_ROLE_id' => $validate['DB_ROLE_id'],
            'DB_GRADE_id' => $validate['DB_GRADE_id'],
            'DB_SECTION_id' => $validate['DB_SECTION_id'],

            'name_last' => $validate['name_last'],
            'name_first' => $validate['name_first'],
        ]);

        self::func_preserve_STUDENT_Section_on_role_change($user);
        self::func_preserve_STUDENT_Section_on_section_change($user);
        self::func_preserve_YEAR_User_on_role_change($user);

        self::func_section_unassign($user);
        self::func_section_assign($user);

        return redirect()->to('/users/edit/'.$id);
    }

    // Delete (GET)
    public function delete_1 ($id) {
        $user = User::find($id);

        return view('pages.users.delete')->with('user', $user);
    }

    // Delete (POST)
    public function delete_2 ($id) {
        $user = User::find($id);

        self::func_section_unassign($user);
        self::func_preserve_YEAR_User_on_deletion($user);

        $user->delete();

        return redirect()->to('/users');
    }

    // Functions
    // [do-not-touch] Create various info that is displayed in the index
    public function func_make_index_info ($param) {
        foreach ($param as $user) {
            $user->role = Role::find($user->DB_ROLE_id)->role;

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

    // [do-not-touch] Validate roles to manage advisory grades and sections
    public function func_validate_role ($validate) {
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

    // [do-not-touch] Step 1: Preserve the adviser's name to the assigned section's students on role change
    public function func_preserve_STUDENT_Section_on_role_change ($user) {
        if ($user->DB_ROLE_id != '4') {
            $sections = Section::where('DB_USER_id', $user->id)->get();

            foreach ($sections as $section) {
                $grade = Grade::find($section->DB_GRADE_id);
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

    // Step 2: Preserve the adviser's name to the assigned section's students on section change
    public function func_preserve_STUDENT_Section_on_section_change ($user) {

    }

    // [do-not-touch] Step 3: Preserve the principal's name to the assigned school year on role change
    public function func_preserve_YEAR_User_on_role_change ($user) {
        if ($user->DB_ROLE_id != '1') {
            $years = Year::where('DB_USER_ID', $user->id)->get();

            foreach ($years as $year) {
                $year->update([
                    'DB_USER_id' => null,

                    'PRESERVE_DB_USER_name_last' => $user->name_last,
                    'PRESERVE_DB_USER_name_first' => $user->name_first,
                ]);
            }
        }
    }

    // [do-not-touch] Step 4: Unassign the adviser from a section
    public function func_section_unassign ($user) {
        // This usage is safe, and the section's user id and user's section id are unique (see migrations)
        $section = Section::where('DB_USER_id', $user->id)->first();

        if ($section != null) {
            $section->update(['DB_USER_id' => null]);
        }
    }

    // [do-not-touch] Step 5: Assign the adviser to a section
    public function func_section_assign ($user) {
        $section = Section::find($user->DB_SECTION_id);

        if ($section != null) {
            $section->update(['DB_USER_id' => $user->id]);
        }
    }

    // Step: 
    /*// Reset preservations of the assigned section's adviser's name.
    public function func_preserve_section_reset ($user) {
        if ($user->DB_ROLE_id == '4') {
            $section = Section::find($user->DB_SECTION_id);
    
            if ($section != null) {
                $grade = Grade::find($section->DB_GRADE_id);
                $students = Student::where('DB_SECTION_id_g'.$grade->grade, $section->id)->get();

                foreach ($students as $student) {
                    $student->update([
                        'PRESERVE_DB_USER_name_last_g'.$grade->grade => null,
                        'PRESERVE_DB_USER_name_first_g'.$grade->grade => null,
                    ]);
                }
            }
        }
    }*/


    // Preserve the principal's name to the assigned school year on deletion
    public function func_preserve_YEAR_User_on_deletion ($user) {
        $years = Year::where('DB_USER_ID', $user->id)->get();

        foreach ($years as $year) {
            $year->update([
                'DB_USER_id' => null,

                'PRESERVE_DB_USER_name_last' => $user->name_last,
                'PRESERVE_DB_USER_name_first' => $user->name_first,
            ]);
        }
    }

    //
    public function func_preserve_STUDENT_Section_on_deletion ($user) {

    }
}