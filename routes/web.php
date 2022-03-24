<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Session::has('usersession')) {
        return view('dashboard');
    } else {
        return view('home');
    }
});
Route::get('/logout', function () {
    Session::forget('usersession');
    return redirect('/');
});
Route::get('/userlist', function () {
// $client = new GuzzleHttp\Client();
    // $res = $client->get(asset('api/users'));
    // return $res->getBody();
    $recordPaginate=2;
    return view('userlist', ['users' => UserController::index($recordPaginate=2)]);
});

Route::post('/', [UserController::class, 'login']);
