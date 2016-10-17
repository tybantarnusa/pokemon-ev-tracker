<?php

namespace App\Http\Controllers;

use App\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index() {
        $users = Users::all();
        return response()->json($users);
    }

    public function getUser($id) {
        $user = Users::find($id);
        return response()->json($user);
    }

    public function createUser(Request $request) {
        $user = Users::create($request->all());
        return response()->json($user);
    }

    public function updateUser($id) {
        $user = Users::find($id);
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->token = $request->input('token');
        $user->save();

        return response()->json($user);
    }

    public function deleteUser($id) {
        $user = Users::find($id);
        $user->delete();

        return response()->json('Deleted');
    }

}
