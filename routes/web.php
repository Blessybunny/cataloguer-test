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
Route::get('/', 'App\Http\Controllers\StudentController@index');

// DASHBOARD ELEMENTS
Route::get('/students', 'App\Http\Controllers\StudentController@index');
Route::get('/students/manager/{id}', 'App\Http\Controllers\StudentController@edit');
Route::post('/students/manager/{id}', 'App\Http\Controllers\StudentController@save');