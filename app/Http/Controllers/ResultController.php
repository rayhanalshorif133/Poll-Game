<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function resultPage()
    {
        return view('public.result');
    }
}
