<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $navItem = 'player-list';
        return view('player.index', compact('navItem'));
    }

    public function view()
    {
        $navItem = 'player-list';
        return view('player.view', compact('navItem'));
    }
}
