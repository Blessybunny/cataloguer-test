<?php

use Illuminate\Support\Facades\Route;

// LOGIN
Route::get('/', 'App\Http\Controllers\LoginController@redirect');
Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login');

// MIDDLEWARE
//Route::middleware(['auth'])->group(function () {
    Route::get('/logout', 'App\Http\Controllers\StudentController@logout');

    Route::get('/students', 'App\Http\Controllers\StudentController@index');
    Route::get('/students/edit/{id}', 'App\Http\Controllers\StudentController@edit');
    Route::post('/students/save/{id}', 'App\Http\Controllers\StudentController@save');
    
    Route::get('/users', 'App\Http\Controllers\UserController@index');
//});