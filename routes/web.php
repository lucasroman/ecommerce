<?php

<<<<<<< HEAD
use App\Http\Controllers\ProfileController;
=======
use App\Http\Controllers\UserController;
>>>>>>> 9374756 (Web: 'users/create' use UserController)
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/create', [UserController::class, 'create'])
    ->name('users.create');
// users.create
Route::get('/users/create', [UserController::class, 'create'])
    ->name('users.create');

// users.store
Route::post('/users', [UserController::class, 'store'])
    ->name('users.store');

// users.show
Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show');
