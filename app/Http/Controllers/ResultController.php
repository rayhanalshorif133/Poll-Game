<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function resultPage($id)
    {
        $match = Matches::select()
            ->with('team1', 'team2', 'poll', 'tournament')
            ->where('id', '=', $id)
            ->first();
        return view('public.result', compact('match'));
    }
}
