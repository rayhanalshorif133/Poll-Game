<?php

namespace App\Http\Controllers;

use App\Models\Sports;
use DataTables;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function index(Request $request)
    {
        $navItem = "sports-list";
        if ($request->ajax()) {
            $data = Sports::all();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return true;
                })
                ->make(true);
        }

        return view('sports.index', compact('navItem'));
    }

    public function create()
    {
        $navItem = "sports-create";
        return view('sports.create', compact('navItem'));
    }
}
