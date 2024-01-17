<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    // Index
    public function index () {
        $users = User::all();
        
        return view('pages.users.index', compact('users'));
    }
}