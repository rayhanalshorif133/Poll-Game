<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Subscription;
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
        $subscription = Subscription::where('account_id', $playerInfo->id)
            ->with('match', 'match.tournament')
            ->get();

        $data = [
            'playerInfo' => $playerInfo,
            'subscription' => $subscription,
        ];

        $playerInfo->avatar = $playerInfo->avatar ? $playerInfo->avatar : 'web/images/account-img.png';
        $playerInfo->save();
        return $this->respondWithSuccess('Player search by phone', $data);
    }
}
