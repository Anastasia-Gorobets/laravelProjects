<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');

    }

    public function autocomplete(Request $request)
    {
        $users = User::where('name','LIKE',"%".$request->get('query')."%")->get(['name']);
        return response()->json($users);
    }
}
