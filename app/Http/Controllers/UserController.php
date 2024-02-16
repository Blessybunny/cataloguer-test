<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
use App\Models\User;
use Request;

class UserController extends Controller {
    // Redirect
    public function redirect () { return redirect()->to('/users'); }

    // Index (GET)
    public function index_1 () {
        $grades = Grade::all();
        $roles = Role::all();
        $sections = Section::all();
        $users = User::orderBy('name_last', 'ASC')->get();

        return view('pages.users.index')
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections)
            ->with('users', $users);
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
        $grades = Grade::all();
        $roles = Role::all();
        $sections = Section::all();

        return view('pages.users.create')
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections);
    }

    // Create (POST)
    public function create_2 () {
        $validate = request()->validate([
            'db_role_id' => 'required',
            'db_grade_id' => 'nullable',
            'db_section_id' => 'nullable',

            'email' => 'required|unique:users,email',
            'password' => 'required',

            'name_last' => 'required',
            'name_first' => 'required',
        ]);

        $user = User::create([
            'db_role_id' => $validate['db_role_id'],
            'db_grade_id' => $validate['db_grade_id'],
            'db_section_id' => $validate['db_section_id'],

            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),

            'name_last' => $validate['name_last'],
            'name_first' => $validate['name_first'],
        ]);

        // For some reason, changing validated variables works only when the user is created.
        // Role IDs (see seeders)
        if ($validate['db_role_id'] == "1" || $validate['db_role_id'] == "2") {
            $validate['db_grade_id'] = null;
            $validate['db_section_id'] = null;
        }

        if ($validate['db_role_id'] == "3") {
            $validate['db_section_id'] = null;
        }

        if ($validate['db_role_id'] == "4" || $validate['db_role_id'] == "5") {
            $validate['db_grade_id'] = null;
        }

        User::where('id', $user->id)->update([
            'db_grade_id' => $validate['db_grade_id'],
            'db_section_id' => $validate['db_section_id'],
        ]);

        return redirect()->to('/users');
    }

    // Edit (GET)
    public function edit_1 ($id) {
        $grades = Grade::all();
        $roles = Role::all();
        $sections = Section::all();
        $user = User::findOrFail($id);

        return view('pages.users.edit')
            ->with('grades', $grades)
            ->with('roles', $roles)
            ->with('sections', $sections)
            ->with('user', $user);
    }

    // Edit (POST)
    public function edit_2 ($id) {
        $validate = request()->validate([
            'db_role_id' => 'required',
            'db_grade_id' => 'nullable',
            'db_section_id' => 'nullable',

            'name_last' => 'required',
            'name_first' => 'required',
        ]);

        // Role IDs (see seeders)
        if ($validate['db_role_id'] == "1" || $validate['db_role_id'] == "2") {
            $validate['db_grade_id'] = null;
            $validate['db_section_id'] = null;
        }

        if ($validate['db_role_id'] == "3") {
            $validate['db_section_id'] = null;
        }

        if ($validate['db_role_id'] == "4" || $validate['db_role_id'] == "5") {
            $validate['db_grade_id'] = null;
        }

        User::where('id', $id)->update([
            'db_role_id' => $validate['db_role_id'],
            'db_grade_id' => $validate['db_grade_id'],
            'db_section_id' => $validate['db_section_id'],

            'name_last' => $validate['name_last'],
            'name_first' => $validate['name_first'],
        ]);

        return redirect()->to('/users/edit/'.$id);
    }

    // Delete (GET)
    public function delete_1 ($id) {
        $user = User::findOrFail($id);

        return view('pages.users.delete')->with('user', $user);
    }

    // Delete (POST)
    public function delete_2 ($id) {
        User::where('$id', $id)->delete();

        return redirect()->to('/users');
    }
}