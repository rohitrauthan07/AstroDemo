<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function main()
    {
        // $profiles = User::all();
        $profiles = User::where('role', 'user')->get();
        return view('home', compact('profiles'));
    }
}
