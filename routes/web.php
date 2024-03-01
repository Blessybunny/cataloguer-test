<?php

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

Route::get('/students/edit/area/{id}', 'App\Http\Controllers\StudentController@edit_area_1');
Route::post('/students/edit/area/{id}', 'App\Http\Controllers\StudentController@edit_area_2');

Route::get('/students/edit/form/{id}', 'App\Http\Controllers\StudentController@edit_form_1');
Route::post('/students/edit/form/{id}', 'App\Http\Controllers\StudentController@edit_form_2');

Route::get('/students/delete/{id}', 'App\Http\Controllers\StudentController@delete_1');
Route::post('/students/delete/{id}', 'App\Http\Controllers\StudentController@delete_2');

// USER
Route::get('/users', 'App\Http\Controllers\UserController@index_1');
Route::post('/users', 'App\Http\Controllers\UserController@index_2');

Route::get('/users/create', 'App\Http\Controllers\UserController@create_1');
Route::post('/users/create', 'App\Http\Controllers\UserController@create_2');

Route::get('/users/view/{id}', 'App\Http\Controllers\UserController@view');

Route::get('/users/edit/{id}', 'App\Http\Controllers\UserController@edit_1');
Route::post('/users/edit/{id}', 'App\Http\Controllers\UserController@edit_2');

Route::get('/users/delete/{id}', 'App\Http\Controllers\UserController@delete_1');
Route::post('/users/delete/{id}', 'App\Http\Controllers\UserController@delete_2');

// YEAR
Route::get('/years', 'App\Http\Controllers\YearController@index_1');
Route::post('/years', 'App\Http\Controllers\YearController@index_2');

Route::get('/years/create', 'App\Http\Controllers\YearController@create_1');
Route::post('/years/create', 'App\Http\Controllers\YearController@create_2');

Route::get('/years/view/{id}', 'App\Http\Controllers\YearController@view');

Route::get('/years/edit/{id}', 'App\Http\Controllers\YearController@edit_1');
Route::post('/years/edit/{id}', 'App\Http\Controllers\YearController@edit_2');

// LOGIN
Route::get('/', 'App\Http\Controllers\LoginController@redirect');
Route::get('/login', 'App\Http\Controllers\LoginController@index_1')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@index_2');

// HOME
Route::get('/home', 'App\Http\Controllers\Controller@land');

// MIDDLEWARE
Route::middleware(['auth'])->group(function () {
    Route::get('/logout','App\Http\Controllers\LoginController@logout');
});