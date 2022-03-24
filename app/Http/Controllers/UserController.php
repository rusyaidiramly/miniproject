<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
        // return $row ? User::all()->paginate($rows) : User::all();
        return User::jsonPaginate();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        return User::create($request->all());
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        if (!$user) {
            return response()->json(['success' => false], 500);
        } else {
            return response()->json(['success' => true], 200);
        }
    }

    public function destroy($id)
    {
        $user = User::destroy($id);
        if (!$user) {
            return response()->json(['success' => false], 500);
        } else {
            return response()->json(['success' => true], 200);
        }
    }

    public function search($nameOrEmail)
    {
        return User::where('name', 'like', '%' . $nameOrEmail . '%')
            ->orWhere('email', 'like', '%' . $nameOrEmail . '%')
            ->jsonPaginate();
            ;
    }

    public function login(Request $req)
    {
        $user = User::where(['email' => $req->email])
            ->where(['password' => $req->password])->first();

        if (!$user) {
            return response()->json([
                'success' => false, 'message' => 'Username or passowrd is not matched',
            ], 500);
        } else {
            $req->session()->put('usersession', $user);
            return view('dashboard');
        }
    }

}
