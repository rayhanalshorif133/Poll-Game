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
                ->with('createdBy', 'updatedBy')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('description', function ($row) {
                    $text = strip_tags($row->description);
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
        return view('team.create', compact('navItem'));
    }


    public function view($id)
    {
        $navItem = "team-view";
        $team = Team::find($id);
        return view('team.view', compact('navItem', 'team'));
    }
    public function edit($id)
    {
        $navItem = "team-view";
        $team = Team::find($id);
        return view('team.view', compact('navItem', 'team'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required',
        ]);

        $team = new Team();
        $team->name = $request->name;
        if ($request->logo) {
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('storage/images/team'), $imageName);
            $imageName = 'storage/images/team/' . $imageName;
            $team->logo = $imageName;
        } else {
            $team->logo = '/images/team/default.png';
        }
        if ($request->banner) {
            $imageName = time() . '.' . $request->banner->extension();
            $request->banner->move(public_path('storage/images/team'), $imageName);
            $imageName = 'storage/images/team/' . $imageName;
            $team->banner = $imageName;
        } else {
            $team->banner = '/images/team/default.png';
        }
        $team->status = $request->status;
        $team->created_by = auth()->user()->id;
        $team->updated_by = auth()->user()->id;
        $team->save();
        Session::flash('message', 'Team created successfully.');
        Session::flash('class', 'success');
        return redirect()->route('team.index');
    }
    public function update()
    {
    }
}
