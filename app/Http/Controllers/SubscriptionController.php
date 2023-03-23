<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $navItem = 'subscription-list';
        return view('subscription.index', compact('navItem'));
    }
}
