<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class);
Route::get('/users/search/{nameOrEmail}', [UserController::class, 'search']);
