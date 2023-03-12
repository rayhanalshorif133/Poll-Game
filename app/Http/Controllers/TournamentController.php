<?php

namespace App\Http\Controllers;

use App\Models\Sports;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TournamentController extends Controller
{
    public function index(Request $request)
    {
        $navItem = "tournament-list";
        if ($request->ajax()) {
            $data = Tournament::select()
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

        return view('tournament.index', compact('navItem'));
    }

    public function create()
    {
        $navItem = "tournament-create";
        $sports = Sports::select()->get();
        return view('tournament.create', compact('navItem', 'sports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sport_id' => 'required',
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $tournament = new Tournament();
        $tournament->sports_id = $request->sport_id;
        $tournament->name = $request->name;
        $tournament->start_date = $request->start_date;
        $tournament->end_date = $request->end_date;
        $tournament->description = $request->description;
        if ($request->hasFile('icon')) {
            $imageName = time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('storage/images/tournament'), $imageName);
            $imageName = 'storage/images/tournament/' . $imageName;
            $tournament->icon = $imageName;
        } else {
            $tournament->icon = '/images/tournament/default.png';
        }
        if ($request->hasFile('banner')) {
            $imageName = time() . '.' . $request->banner->extension();
            $request->banner->move(public_path('storage/images/tournament'), $imageName);
            $imageName = 'storage/images/tournament/' . $imageName;
            $tournament->banner = $imageName;
        } else {
            $tournament->banner = '/images/tournament/default.png';
        }

        $tournament->remarks = $request->remarks;
        $tournament->status = $request->status;
        $tournament->created_by = Auth::user()->id;
        $tournament->updated_by = Auth::user()->id;
        $tournament->save();

        return redirect()->route('tournament.index')->with('success', 'Tournament created successfully.');
    }

    public function view($id)
    {
        $navItem = "tournament-list";
        $sports = Sports::select()->get();
        $tournament = Tournament::select()->where('id', $id)->with('sports', 'createdBy', 'updatedBy')->first();
        return view('tournament.view', compact('navItem', 'sports', 'tournament'));
    }

    public function edit($id)
    {
        $navItem = "tournament-list";
        $sports = Sports::select()->get();
        $tournament = Tournament::select()->where('id', $id)->with('sports', 'createdBy', 'updatedBy')->first();
        return view('tournament.view', compact('navItem', 'sports', 'tournament'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sport_id' => 'required',
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $tournament = Tournament::find($request->id);
        $tournament->sports_id = $request->sport_id;
        $tournament->name = $request->name;
        $tournament->start_date = $request->start_date;
        $tournament->end_date = $request->end_date;
        $tournament->description = $request->description ? $request->description : $tournament->description;
        if ($request->hasFile('icon')) {
            // Delete old image
            Storage::delete($tournament->icon);
            $imageName = time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('storage/images/tournament'), $imageName);
            $imageName = 'storage/images/tournament/' . $imageName;
            $tournament->icon = $imageName;
        } else {
            $tournament->icon = '/images/tournament/default.png';
        }
        if ($request->hasFile('banner')) {
            // Delete old image
            Storage::delete($tournament->banner);
            $imageName = time() . '.' . $request->banner->extension();
            $request->banner->move(public_path('storage/images/tournament'), $imageName);
            $imageName = 'storage/images/tournament/' . $imageName;
            $tournament->banner = $imageName;
        } else {
            $tournament->banner = '/images/tournament/default.png';
        }

        $tournament->remarks = $request->remarks ? $request->remarks : $tournament->remarks;
        $tournament->status = $request->status;
        $tournament->created_by = Auth::user()->id;
        $tournament->updated_by = Auth::user()->id;
        $tournament->save();

        return redirect()->route('tournament.index')->with('success', 'Tournament created successfully.');
    }
}
