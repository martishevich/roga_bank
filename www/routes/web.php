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


Route::match(['get', 'post'], '/login', 'UserController@login');
Route::match(['get', 'post'], '/userPage', 'UserController@userPage')->middleware(['authorith']);
Route::match(['get', 'post'], '/userUpdateData', 'UserController@userUpdateData')->middleware(['authorith']);
Route::match(['get', 'post'], '/transfer', 'TransferController@transferPage')->middleware(['authorith']);
Route::match(['get', 'post'], '/transferPass', 'TransferController@transferPass')->middleware(['authorith']);
Route::match(['get', 'post'], '/transferConfirm', 'TransferController@transferConfirm')->middleware(['authorith']);

Route::match(['get', 'post'], '/loginAdmin', 'AdminController@loginAdmin');
Route::match(['get', 'post'], '/adminPage', 'AdminController@adminPage')->middleware(['adminauthorith']);
Route::match(['get', 'post'], '/createUser', 'AdminController@showCreateUser')->middleware(['adminauthorith']);
Route::post('/createUser', 'AdminController@createUser')->middleware(['adminauthorith']);


Route::get('adminPage/{id}/show', 'AdminController@show')->name('user.show');
Route::post('adminPage/{id}/show', 'AdminController@show');

Route::delete('adminPage/{id}/delete', 'AdminController@softDelete')->name('user.delete');

Route::match (['get', 'post'], 'adminPage/{id}/edit', 'AdminController@edit')->name('user.edit');

Route::get('/paymentPage', 'PaymentController@paymentPage');
Route::post('paymentPage', 'PaymentController@paymentPage');

Route::match (['get', 'post'], '/cardConfirmation', 'PaymentController@cardConfirmation');
Route::match (['get', 'post'], '/passwordConfirmation', 'PaymentController@passwordConfirmation');
