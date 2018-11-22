<?php

use \Illuminate\Support\Facades\DB;
use App\Task;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index');
<<<<<<< HEAD
Route::get('/login', 'MainController@login');
Route::get('/tasks/{task}', 'TasksController@show');
=======
>>>>>>> develop

Route::get('/about', function () {
	return view('main/about');
});

Route::get('/login', function () {
	return view('main/login');
});

