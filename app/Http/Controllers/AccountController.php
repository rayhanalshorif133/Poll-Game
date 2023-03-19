<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index()
    {

        if (isset($_COOKIE["account_id"])) {
            $account_id = $_COOKIE["account_id"];
        }
        if ($account_id) {
            $account = Account::where('id', $account_id)->first();
            return view('public.account', compact('account'));
        } else {
            Session::flash('message', 'Please login to view your account');
            Session::flash('class', 'danger');
            return redirect()->back();
        }
    }
}
