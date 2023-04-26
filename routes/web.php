<?php

use App\Models\Task;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks/create', [TaskController::class, 'create'])
    ->name('tasks.create');

Route::post('/tasks', [TaskController::class, 'store'])
    ->name('tasks.store');

Route::get('/routemodelbinding/{task}', function (Task $task) {
    return $task;
});

Route::get('/tasks', [TaskController::class, 'index']);

// Route::get('/routemodelbinding/{loquesea}', function ($num) {

//     $task = Task::findOrFail($num);
    
//     return $task;
// });