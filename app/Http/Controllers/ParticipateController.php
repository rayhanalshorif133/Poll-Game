<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipateController extends Controller
{
    public function index()
    {
        $navItem = 'participate-list';
        return view('participate.index', compact('navItem'));
    }
}
