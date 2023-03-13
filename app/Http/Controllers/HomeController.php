<?php

namespace App\Http\Controllers;

use App\Models\Sports;
use App\Models\User;

class HomeController extends Controller
{

    public function userDashboard()
    {
        $navItem = "dashboard";
        $users = User::count();
        return view('user.dashboard', compact('users', 'navItem'));
    }


    public function welcome()
    {
        return view('public.get_started.index');
    }

    public function home()
    {
        $sports = Sports::all();
        return view('public.home', compact('sports'));
    }
}
