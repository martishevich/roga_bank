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

//Route::get('/login', 'UserController@login');
Route::match(['get', 'post'],'/login', 'UserController@login');
Route::match(['get', 'post'],'/userPage', 'UserController@userPage')->middleware(['authorith']);
//Route::post('/userPage', 'UserController@userPage');

Route::match(['get', 'post'],'/loginAdmin', 'AdminController@loginAdmin');
//Route::post('/loginAdmin', 'AdminController@loginAdmin');
Route::match(['get', 'post'],'/adminPage', 'AdminController@adminPage')->middleware(['adminauthorith']);
Route::get('/createUser', 'AdminController@showCreateUser')->middleware(['adminauthorith']);
Route::post('/createUser', 'AdminController@createUser')->middleware(['adminauthorith']);
//Route::post('/adminPage', 'AdminController@adminPage');

Route::get('adminPage/{id}/show', 'AdminController@show')->name('user.show');
Route::post('adminPage/{id}/show', 'AdminController@show');

Route::delete('adminPage/{id}/destroy', 'AdminController@destroy')->name('user.destroy');




