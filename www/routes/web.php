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
Route::get('/tasks/{task}', 'TasksController@show');

/*Route::get('tasks', function () {
    $tasks =Task::incomplete();
    return view('tasks.app',compact('tasks'));
});

Route::get('tasks/{task}', function ($id) {
    $task = Task::find($id);
    return view('tasks.show',compact('task'));
});*/