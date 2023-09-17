<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchUsers(Request $request): JsonResponse
    {
        $query = $request->input('searchTerm');

    if ($query) {
        $users = User::where('name', 'like', '%' . $query . '%')->get();
    } else {
        $users = [];
    }
        return response()->json(['users'=> $users]);
    }
}
