<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    if (Session::has('usersession')) {
        return view('dashboard');
    } else {
        return view('home');
    }
});
Route::get('/register', function () {
    if (Session::has('usersession')) {
        return redirect('/');
    } else {
        return view('register');
    }
});
Route::get('/logout', function () {
    Session::forget('usersession');
    return redirect('/');
});
Route::get('/userlist', function () {
    return view('userlist', ['users' => UserController::index()]);
});
Route::get('/profile', function () {
    return view('profile', ['user' => UserController::show(Session::get('usersession')->id)]);
});
Route::get('/userlist/search', function (Request $request) {
    if($request->q=='') return redirect('/userlist');
    return view('userlist', ['users' => UserController::search($request->q), 'searchStr' => $request->q]);
});

Route::post('/', [UserController::class, 'login']);
Route::post('/register', function (Request $request) {
    UserController::store($request);
    UserController::login($request);
    return redirect('/');
});
