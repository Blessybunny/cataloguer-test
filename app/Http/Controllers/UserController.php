<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
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

        foreach ($users as $user) {
            $user->role = Role::find($user->DB_ROLE_id)->role;

            if ($user->DB_ROLE_id == '1' || $user->DB_ROLE_id == '2') {
                $user->advisory = 'N/A';
            }
            else if ($user->DB_ROLE_id == '3') {
                $grade = Grade::find($user->DB_GRADE_id)->grade;
                $user->advisory = 'Grade '.$grade;
            }
            else if ($user->DB_ROLE_id == '4' || $user->DB_ROLE_id == '5') {
                $section = Section::find($user->DB_SECTION_id);
                $grade = Grade::find($section->DB_GRADE_id)->grade;
                $section = $section->section;
                $user->advisory = 'Grade '.$grade.' - '.$section;
            }
        }

        return view('pages.users.index')->with('users', $users);
    }

    // Index (POST)
    public function index_2 () {
        $terms = Request::get('terms');

        if (isset($terms)) {
            $temp_terms = explode(' ', $terms);
            $query = User::query();

            foreach($temp_terms as $term){
                $query->where(function ($q) use ($term) {
                    $q->where('email', 'like', '%'.$term.'%')
                    ->orWhere('name_last', 'like', '%'.$term.'%')
                    ->orWhere('name_first', 'like', '%'.$term.'%');
                });
            }

            $results = $query->get();
            $results = (count($results) > 0) ? $results : [];
            $grades = Grade::all();
            $roles = Role::all();
            $sections = Section::all();

            return view('pages.users.index')
                ->with('isSearched', true)
                ->with('terms', $terms)
                ->with('results', $results)
                ->with('grades', $grades)
                ->with('roles', $roles)
                ->with('sections', $sections);
        }
        else return redirect()->to('/users');
    }

    // Create (GET)
    public function create_1 () {
        $grades = Grade::all(); // safe
        $roles = Role::all(); // safe
        $sections = Section::all();

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

        // Role IDs (see seeders)
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

        User::create([
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

    // Edit (GET)
    public function edit_1 ($id) {
        $grades = Grade::all(); // safe
        $roles = Role::all(); // safe
        $sections = Section::all();
        $user = User::find($id); // safe

        return view('pages.users.edit')
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections)
            ->with('user', $user);
    }

    // Edit (POST)
    public function edit_2 ($id) {
        $validate = request()->validate([
            'DB_ROLE_id' => 'required',
            'DB_GRADE_id' => 'nullable',
            'DB_SECTION_id' => 'nullable',

            'name_last' => 'required',
            'name_first' => 'required',
        ]);

        $user = User::find($id);

        // Role IDs (see seeders)
        if ($user->DB_ROLE_id != $validate['DB_ROLE_id']) {
            $years = Year::where('DB_USER_ID', $id)->get();

            foreach ($years as $year) {
                $year->update([
                    'DB_USER_id' => null,

                    'REMEMBER_DB_USER_name_last' => $user->name_last,
                    'REMEMBER_DB_USER_name_first' => $user->name_first,
                ]);
            }
        }

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

        $user->update([
            'DB_ROLE_id' => $validate['DB_ROLE_id'],
            'DB_GRADE_id' => $validate['DB_GRADE_id'],
            'DB_SECTION_id' => $validate['DB_SECTION_id'],

            'name_last' => $validate['name_last'],
            'name_first' => $validate['name_first'],
        ]);

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
        $years = Year::where('DB_USER_ID', $id)->get();

        foreach ($years as $year) {
            $year->update([
                'DB_USER_id' => null,

                'REMEMBER_DB_USER_name_last' => $user->name_last,
                'REMEMBER_DB_USER_name_first' => $user->name_first,
            ]);
        }

        $user->delete();

        return redirect()->to('/users');
    }
}