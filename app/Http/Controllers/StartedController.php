<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartedController extends Controller
{
    public function landingPageOne()
    {
        return view('public.get_started.landing-pages.page_one');
    }

    public function landingPageTwo()
    {
        return view('public.get_started.landing-pages.page_two');
    }

    public function landingPageFinal()
    {
        return view('public.get_started.landing-pages.page_final');
    }
}
