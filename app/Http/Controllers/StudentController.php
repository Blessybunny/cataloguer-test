<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller {
    
    // Index
    public function index () {
        $students = Student::all();
        
        return view('dashboard.students', compact('students'));
    }

    // Manage
    public function manage ($id) {
        $student = Student::findOrFail($id);
        
        return view('dashboard.manager', compact('student'));
    }
    
}
