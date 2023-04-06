<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function player(Request $request)
    {
        $navItem = 'player-report';
        return view('reports.player', compact('navItem'));
    }
    public function playerSearchByPhone($phone)
    {
        // like
        $phone = str_replace('880', '', $phone);
        $playerInfo = Account::where('phone', 'like', "%$phone%")->first();
        return $this->respondWithSuccess('Player search by phone', $playerInfo);
    }
}
