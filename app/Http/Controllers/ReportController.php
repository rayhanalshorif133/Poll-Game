<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Matches;
use App\Models\Participate;
use App\Models\Subscription;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function player(Request $request)
    {
        $navItem = 'player-report';
        return view('reports.player', compact('navItem'));
    }
    public function playerSearchByPhoneNumbers($phone)
    {
        $phone = str_replace('880', '', $phone);
        $playerInfo = Account::where('phone', 'like', "%$phone%")->get();
        return $this->respondWithSuccess('Player search by phone', $playerInfo);
    }
    public function playerSearchByMatchTitle($match_title)
    {
        $matchInfo = Matches::where('title', 'like', "%$match_title%")->get();
        return $this->respondWithSuccess('Match Search by title', $matchInfo);
    }
    public function playerSearchByPhone($phone)
    {
        // like
        $phone = str_replace('880', '', $phone);
        $playerInfo = Account::where('phone', 'like', "%$phone%")->first();
        $subscription = [];
        $participate = [];
        if ($playerInfo) {
            $playerInfo->avatar = $playerInfo->avatar ? $playerInfo->avatar : '/web/images/account-img.png';
            $playerInfo->save();
            $subscription = Subscription::where('account_id', $playerInfo->id)
                ->with('match', 'match.tournament')
                ->get();
            $participate = Participate::select()
                ->where('account_id', $playerInfo->id)
                ->with('match', 'match.tournament')
                ->orderBy('point', 'desc')
                ->get();
        }

        $data = [
            'playerInfo' => $playerInfo,
            'subscription' => $subscription,
            'participate' => $participate,
        ];

        return $this->respondWithSuccess('Player search by phone', $data);
    }

    public function getPoint($player_id, $match_id)
    {
        $participates = Participate::where('account_id', $player_id)
            ->where('match_id', $match_id)
            ->with('match')
            ->get();
        $participates->each(function ($participate) {
            $participate->total_days = $participate->match->timeDiff($participate->match->id);
        });
        return $this->respondWithSuccess('Player point', $participates);
    }
}
