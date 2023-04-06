<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function player(Request $request)
    {
        dd($request->all());
        // return view('report.player');
    }
}
