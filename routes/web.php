<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    
// LOGIN
// to-do: place login here
Route::get('/', function () { return view('primary/dashboard'); });//login

// DASHBOARD ELEMENTS
Route::get('/student-viewer', function () { return view('dashboard/student-viewer'); });






// PRIMARY
Route::get('/', function () { return view('primary/students'); });
Route::get('/students', function () { return view('primary/students'); });
Route::get('/classes', function () { return view('primary/classes'); });
Route::get('/subjects', function () { return view('primary/subjects'); });

// SECONDARY
Route::get('/grade-card', function () { return view('secondary/grade-card'); });
Route::get('/permanent-form', function () { return view('secondary/permanent-form'); });
Route::get('/semestral-grades', function () { return view('dashboard/semestral-grades'); });
/*
Route::get('/login', 'AuthenticationsController@indexLogin')->name('login');
Route::post('/login', 'AuthenticationsController@login');
Route::middleware(['auth'])->group(function () {
    // to-do: place every other web pages in here
    Route::get('/logout', 'AuthenticationsController@logout');
    Route::get('/dashboard', 'DashboardsController@index');
});*/
