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

Route::get('/about', function () {
	return view('main/about');
});

Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@login');
Route::get('/userPage', 'UserController@userPage');

Route::get('/loginAdmin', 'AdminController@loginAdmin');
Route::post('/loginAdmin', 'AdminController@loginAdmin');
Route::get('/adminPage', 'AdminController@adminPage');



