<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/user', [AuthController::class, 'getUser'])->name('get');


    Route::get('/search/users', [SearchController::class, 'searchUsers']);


    Route::get('/users/{user}', [SearchController::class, 'user'])->name('user.get');

    Route::get('/chat-messages', [MessageController::class, 'messages'])->name('messages.get');

    Route::post('/post-messages', [MessageController::class, 'store'])->name('message.post');
});



