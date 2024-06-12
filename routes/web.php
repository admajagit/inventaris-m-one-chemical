<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


// Redirect root URL to login
Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/items', ItemController::class);
    Route::resource('categories', CategoryController::class);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});