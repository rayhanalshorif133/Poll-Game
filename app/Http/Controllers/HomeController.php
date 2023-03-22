<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Poll;
use App\Models\Sports;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\User;

class HomeController extends Controller
{

    public function userDashboard()
    {
        $navItem = "dashboard";
        $users = User::count();
        $sports = Sports::count();
        $tournaments = Tournament::count();
        $teams = Team::count();
        $matches = Matches::count();
        $polls = Poll::count();
        return view('user.dashboard', compact('users', 'sports', 'tournaments', 'teams', 'matches', 'polls', 'navItem'));
    }


    public function welcome()
    {
        $cookie_name = "is_start_flag";
        if (isset($_COOKIE[$cookie_name])) {
            return redirect()->route('public.home');
        }
        return view('public.get_started.index');
    }

    public function home()
    {
        $cookie_name = "is_start_flag";
        $cookie_value = true;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        $sports = Sports::all();
        return view('public.home', compact('sports'));
    }
}
