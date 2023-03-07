<?php

namespace App\Http\Controllers;

use App\Models\Sports;
use DataTables;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function index(Request $request)
    {
        $navBar = "sports";
        if ($request->ajax()) {
            $data = Sports::all();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return true;
                })
                ->make(true);
        }

        return view('sports.index', compact('navBar'));
    }

    public function create()
    {
        dd('create');
        // return view('sports.create');
    }
}
