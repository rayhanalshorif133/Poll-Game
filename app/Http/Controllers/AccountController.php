<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index()
    {

        if (isset($_COOKIE["account_id"])) {
            $account_id = $_COOKIE["account_id"];
            $account = Account::where('id', $account_id)->first();
        }
        if ($account) {
            $matches = Matches::select()
                ->with('team1', 'team2', 'poll', 'tournament')
                ->where('status', 'active')
                ->get();
            return view('public.account', compact('account', 'matches'));
        } else {
            Session::flash('message', 'Please login to view your account');
            Session::flash('class', 'danger');
            return redirect()->back();
        }
    }
}
