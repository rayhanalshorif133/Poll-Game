<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\About;
use App\Models\Color;
use App\Models\HeaderAndFooter;
use App\Models\Service;
use App\Models\WhatWeDo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
}
