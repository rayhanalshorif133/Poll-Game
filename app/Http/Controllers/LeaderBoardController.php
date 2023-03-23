<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Matches;
use App\Models\Participate;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LeaderBoardController extends Controller
{
    public function leaderBoardPage($id)
    {
        if (isset($_COOKIE["account_id"])) {
            $account_id = $_COOKIE["account_id"];
            $account = Account::where('id', $account_id)->first();
        }
        if ($account) {
            $leaderBoards = [];
            $scores = Participate::select()
                ->where('match_id', $id)
                ->with('account', 'match')
                ->orderBy('created_at', 'asc')
                ->get();
            $scores = $scores->groupBy('account_id');
            foreach ($scores as $score) {
                $leaderBoards[] = [
                    'rank' => 0,
                    'phone_number' => $score[0]->account->phone,
                    'score' => $this->getScore($score),
                    'submitted_at' => $score[0]->created_at,
                ];
            }


            // sort by score
            usort($leaderBoards, function ($a, $b) {
                return $b['score'] <=> $a['score'];
            });


            // add rank
            $rank = 1;
            foreach ($leaderBoards as $key => $leaderBoard) {
                $leaderBoards[$key]['rank'] = $rank;
                $rank++;
            }
            $matchId = $id;
            return view('public.leader_board', compact('account', 'scores', 'leaderBoards', 'matchId'));
        } else {
            Session::flash('message', 'Please login to view your account');
            Session::flash('class', 'danger');
            return redirect()->back();
        }
    }



    public function getScore($score)
    {
        $totalScore = 0;
        foreach ($score as $item) {
            $totalScore += $item->point;
        }
        return $totalScore;
    }
}
