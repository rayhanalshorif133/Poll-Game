<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaderBoardController extends Controller
{
    public function leaderBoardPage()
    {
        return view('public.leader_board');
    }
}
