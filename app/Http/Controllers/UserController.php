<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getUser(User $user) {
        return response()->json($user);
    }
    public function searchUsers(Request $request) {
        $query = $request->input('searchTerm');
        $users = User::where('name', 'like', '%' . $query . '%')->get();

        return response()->json($users);
    }

    public function getusers()
    {
        return response()->json(User::all());
    }

}
