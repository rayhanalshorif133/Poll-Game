<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index($id)
    {
        return view('public.poll.index', compact('id'));
    }
}
