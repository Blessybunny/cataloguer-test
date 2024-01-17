<?php

use Illuminate\Support\Facades\Route;

// LOGIN
Route::get('/', function () { return redirect()->to('/login'); });
Route::get('/login', function () { return view('pages.login.index'); });

// DASHBOARD ELEMENTS
Route::get('/students', 'App\Http\Controllers\StudentController@index');
Route::get('/students/edit/{id}', 'App\Http\Controllers\StudentController@edit');
Route::post('/students/save/{id}', 'App\Http\Controllers\StudentController@save');

Route::get('/users', 'App\Http\Controllers\UserController@index');