<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;

class PollController extends Controller
{

    public function index()
    {
        $navItem = 'poll-list';
        return view('poll.index', compact('navItem'));
    }


    public function poll_page($matchId)
    {
        $match = Matches::select()
            ->where('id', $matchId)
            ->with('team1', 'team2', 'tournament', 'tournament.sports', 'tournament.createdBy', 'tournament.updatedBy')->first();
        return view('public.poll.index', compact('match'));
    }
}
