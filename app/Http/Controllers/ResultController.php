<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResultController extends Controller
{
    public function resultPage($id)
    {
        if (isset($_COOKIE["account_id"])) {
            $account_id = $_COOKIE["account_id"];
            $account = Account::where('id', $account_id)->first();
        }
        if ($account) {
            $match = Matches::select()
                ->with('team1', 'team2', 'poll', 'tournament')
                ->where('id', '=', $id)
                ->first();
            return view('public.result', compact('account', 'match'));
        } else {
            Session::flash('message', 'Please login to view your account');
            Session::flash('class', 'danger');
            return redirect()->back();
        }
    }

    public function resultPageScore($id)
    {
        if (isset($_COOKIE["account_id"])) {
            $account_id = $_COOKIE["account_id"];
            $account = Account::where('id', $account_id)->first();
        }
        if ($account) {
            $match = Matches::select()
                ->with('team1', 'team2', 'poll', 'tournament')
                ->where('id', '=', $id)
                ->first();
            return view('public._partials.result.score', compact('account', 'match'));
        } else {
            Session::flash('message', 'Please login to view your account');
            Session::flash('class', 'danger');
            return redirect()->back();
        }
    }
}
