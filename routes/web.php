<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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



Route::resource('students', 'App\Http\Controllers\StudentController');
Route::get('/student/load-student', 'App\Http\Controllers\StudentController@loadstudent');
Route::get('/student/deleted-student', 'App\Http\Controllers\StudentController@deletedstudent');
Route::get('/student/search-student', 'App\Http\Controllers\StudentController@searchstudent');
Route::get('/class/load-class', 'App\Http\Controllers\ClassStudentController@loadclass');
Route::get('/student/add-student', 'App\Http\Controllers\StudentController@addstudent');
Route::get('/class/add-class', 'App\Http\Controllers\ClassStudentController@addClass');
Route::get('/', function () {
    return redirect('/students');
});


