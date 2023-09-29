<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [AuthController::class, 'getUser'])->name('get');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/search/users', [UserController::class, 'searchUsers'])->name('users.search');

    Route::get("/users/all", [UserController::class, 'getUsers'])->name('users.get');

    Route::get('/users/{user}', [UserController::class, 'getUser'])->name('user.get');

    Route::get('/chat-messages', [MessageController::class, 'messages'])->name('messages.get');

    Route::post('/post-messages', [MessageController::class, 'store'])->name('message.post');
});



