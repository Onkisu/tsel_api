<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // <-- ini penting

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'register']);

Route::get('/register', [AuthController::class, 'welcome']);
Route::match(['get', 'post'],'/saveuser', [AuthController::class, 'save_user'])->name('register.save');

