<?php

use App\Http\Controllers\ChatController;
use App\Models\Service;
use App\Http\Controllers\ProfileController;
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

// Services
Route::get('/serviceslist', function () {
    return view('profile.services-list');
})->middleware(['auth', 'verified'])->name('serviceslist');

Route::get('/service/{service}', function(Service $service) {
    return view('profile.service', ['service' =>  $service]);
})->middleware(['auth', 'verified'])->name('service');

// Chat Get
Route::get('/service/{service}/chats', [ChatController::class, 'create'])->middleware(['auth', 'verified'])->name('chat');

// Chat Post
Route::post('/service/chat', [ChatController::class, 'store'])
    ->name('chat.store');

// Authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::view('/component', 'testReactComponent');