<?php

use Illuminate\Support\Facades\Route;

// LOGIN
Route::get('/', 'App\Http\Controllers\LoginController@redirect');
Route::get('/login', 'App\Http\Controllers\LoginController@index_1')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@index_2');

    // HOME
    Route::get('/home', 'App\Http\Controllers\Controller@land');

    // LOGOUT
     Route::get('/logout','App\Http\Controllers\LoginController@logout');

    // SECTION
    Route::get('/sections', 'App\Http\Controllers\SectionController@index');

    Route::get('/sections/view/{id}', 'App\Http\Controllers\SectionController@view');

    Route::get('/sections/edit/{id}', 'App\Http\Controllers\SectionController@edit_1');
    Route::post('/sections/edit/{id}', 'App\Http\Controllers\SectionController@edit_2');

    // STUDENT
    Route::get('/students', 'App\Http\Controllers\StudentController@index');
    Route::post('/students', 'App\Http\Controllers\StudentController@index');

    Route::get('/students/create', 'App\Http\Controllers\StudentController@create_1');
    Route::post('/students/create', 'App\Http\Controllers\StudentController@create_2');

    Route::get('/students/view/{id}', 'App\Http\Controllers\StudentController@view');

    Route::get('/students/edit/info/{id}', 'App\Http\Controllers\StudentController@edit_info_1');
    Route::post('/students/edit/info/{id}', 'App\Http\Controllers\StudentController@edit_info_2');

    Route::get('/students/edit/area/{id}', 'App\Http\Controllers\StudentController@edit_area_1');
    Route::post('/students/edit/area/{id}', 'App\Http\Controllers\StudentController@edit_area_2');

    Route::get('/students/edit/form/{id}', 'App\Http\Controllers\StudentController@edit_form_1');
    Route::post('/students/edit/form/{id}', 'App\Http\Controllers\StudentController@edit_form_2');

    Route::get('/students/edit/lock/{id}', 'App\Http\Controllers\StudentController@edit_lock_1');
    Route::post('/students/edit/lock/{id}', 'App\Http\Controllers\StudentController@edit_lock_2');

    Route::get('/students/delete/{id}', 'App\Http\Controllers\StudentController@delete_1');
    Route::post('/students/delete/{id}', 'App\Http\Controllers\StudentController@delete_2');

    // USER
    Route::get('/users', 'App\Http\Controllers\UserController@index');
    Route::post('/users', 'App\Http\Controllers\UserController@index');

    Route::get('/users/create', 'App\Http\Controllers\UserController@create_1');
    Route::post('/users/create', 'App\Http\Controllers\UserController@create_2');

    Route::get('/users/view/{id}', 'App\Http\Controllers\UserController@view');

    Route::get('/users/edit/{id}', 'App\Http\Controllers\UserController@edit_1');
    Route::post('/users/edit/{id}', 'App\Http\Controllers\UserController@edit_2');

    Route::get('/users/password/{id}', 'App\Http\Controllers\UserController@password_1');
    Route::post('/users/password/{id}', 'App\Http\Controllers\UserController@password_2');

    Route::get('/users/delete/{id}', 'App\Http\Controllers\UserController@delete_1');
    Route::post('/users/delete/{id}', 'App\Http\Controllers\UserController@delete_2');

    // YEAR
    Route::get('/years', 'App\Http\Controllers\YearController@index');
    Route::post('/years', 'App\Http\Controllers\YearController@index');

    Route::get('/years/create', 'App\Http\Controllers\YearController@create_1');
    Route::post('/years/create', 'App\Http\Controllers\YearController@create_2');

    Route::get('/years/view/{id}', 'App\Http\Controllers\YearController@view');

    Route::get('/years/edit/{id}', 'App\Http\Controllers\YearController@edit_1');
    Route::post('/years/edit/{id}', 'App\Http\Controllers\YearController@edit_2');
    // MIDDLEWARE
    Route::middleware(['auth'])->group(function () {
});