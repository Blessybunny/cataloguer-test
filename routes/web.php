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
Route::get('/', function () { return redirect()->to('/login'); });
Route::get('/login', function () { return view('pages.login.index'); });

// DASHBOARD ELEMENTS
Route::get('/manager', 'App\Http\Controllers\StudentController@index');
Route::get('/manager/edit/{id}', 'App\Http\Controllers\StudentController@edit');
Route::post('/manager/save/{id}', 'App\Http\Controllers\StudentController@save');