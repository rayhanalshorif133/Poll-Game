<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TournamentController extends Controller
{
    public function index(Request $request)
    {
        $navItem = "tournament-list";
        if ($request->ajax()) {
            $data = Tournament::select()
                ->with('createdBy', 'updatedBy')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return true;
                })
                ->make(true);
        }

        return view('tournament.index', compact('navItem'));
    }

    public function create()
    {
        $navItem = "tournament-create";
        return view('tournament.create', compact('navItem'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);

        $tournament = new Tournament();
        $tournament->name = $request->name;
        $tournament->description = $request->description;
        $tournament->start_date = $request->start_date;
        $tournament->end_date = $request->end_date;
        $tournament->status = $request->status;
        $tournament->created_by = Auth::user()->id;
        $tournament->updated_by = Auth::user()->id;
        $tournament->save();

        return redirect()->route('tournament.index')->with('success', 'Tournament created successfully.');
    }
}
