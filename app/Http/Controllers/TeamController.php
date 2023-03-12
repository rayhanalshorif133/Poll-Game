<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sports;
use App\Models\Tournament;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;


class TeamController extends Controller
{
    public function index(Request $request)
    {
        $navItem = "team-list";
        if ($request->ajax()) {
            $data = Team::select()
                ->with('sports', 'createdBy', 'updatedBy')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('description', function ($row) {
                    $text = strip_tags($row->description);
                    return strlen($text) > 50 ? substr($text, 0, 50) . '...' : $text;
                })
                ->addColumn('remarks', function ($row) {
                    $text = strip_tags($row->remarks);
                    return strlen($text) > 50 ? substr($text, 0, 50) . '...' : $text;
                })
                ->addColumn('action', function ($row) {
                    return true;
                })
                ->make(true);
        }

        return view('team.index', compact('navItem'));
    }

    public function create()
    {
        $navItem = "team-create";
        $sports = Sports::select()->get();
        return view('team.create', compact('navItem', 'sports'));
    }
}
