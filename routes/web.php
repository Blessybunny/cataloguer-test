<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// SECTION
Route::get('/sections', 'App\Http\Controllers\SectionController@index');

Route::get('/sections/edit/{id}', 'App\Http\Controllers\SectionController@edit_1');
Route::post('/sections/edit/{id}', 'App\Http\Controllers\SectionController@edit_2');

// STUDENT
Route::get('/students', 'App\Http\Controllers\StudentController@index_1');
Route::post('/students', 'App\Http\Controllers\StudentController@index_2');

Route::get('/students/create', 'App\Http\Controllers\StudentController@create_1');
Route::post('/students/create', 'App\Http\Controllers\StudentController@create_2');

Route::get('/students/edit/info/{id}', 'App\Http\Controllers\StudentController@edit_info_1');
Route::post('/students/edit/info/{id}', 'App\Http\Controllers\StudentController@edit_info_2');

Route::get('/students/edit/form/{id}', 'App\Http\Controllers\StudentController@edit_form_1');
Route::post('/students/edit/form/{id}', 'App\Http\Controllers\StudentController@edit_form_2');

// USER
Route::get('/users', 'App\Http\Controllers\UserController@index_1');
Route::post('/users', 'App\Http\Controllers\UserController@index_2');

Route::get('/users/create', 'App\Http\Controllers\UserController@create_1');
Route::post('/users/create', 'App\Http\Controllers\UserController@create_2');

Route::get('/users/edit/{id}', 'App\Http\Controllers\UserController@edit_1');
Route::post('/users/edit/{id}', 'App\Http\Controllers\UserController@edit_2');

// YEAR
Route::get('/years', 'App\Http\Controllers\YearController@index_1');
Route::post('/years', 'App\Http\Controllers\YearController@index_2');

Route::get('/years/create', 'App\Http\Controllers\YearController@create_1');
Route::post('/years/create', 'App\Http\Controllers\YearController@create_2');

Route::get('/years/edit/{id}', 'App\Http\Controllers\YearController@edit_1');
Route::post('/years/edit/{id}', 'App\Http\Controllers\YearController@edit_2');

// LOGIN
Route::get('/', 'App\Http\Controllers\LoginController@redirect');
Route::get('/login', 'App\Http\Controllers\LoginController@index');//Test this again//->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login');


// MIDDLEWARE
//Route::middleware(['auth'])->group(function () {
    Route::get('/logout','App\Http\Controllers\LoginController@logout');

    /*$user = Auth::user();

    if ($user->role === "Administrator") {
        return (new UserController)->index();
    }
    else {
        return (new StudentController)->redirect();
    }*/

//});