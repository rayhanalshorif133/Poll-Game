<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sports;
use App\Models\Team;
use App\Models\Matches;
use App\Models\Tournament;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class MatchController extends Controller
{
    public function index(Request $request)
    {
        $navItem = "match-list";
        if ($request->ajax()) {
            $data = Matches::select()
                ->with('tournament', 'team1', 'team2', 'createdBy', 'updatedBy')->get();
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

        return view('match.index', compact('navItem'));
    }

    public function create()
    {
        $navItem = "match-create";
        $tournaments = Tournament::select('id', 'name')->get();
        $teams = Team::select('id', 'name')->get();
        return view('match.create', compact('navItem', 'tournaments', 'teams'));
    }

    public function viewAndEdit($id)
    {
        $navItem = "match-list";
        $match = Matches::select()
            ->where('id', $id)
            ->with('tournament', 'team1', 'team2', 'createdBy', 'updatedBy')->first();
        return view('match.view', compact('match', 'navItem'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'tournament_id' => 'required',
            'team_1' => 'required',
            'team_2' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $sports = new Matches();
        $sports->title = $request->title;
        $sports->tournament_id = $request->tournament_id;
        $sports->team1_id = $request->team_1;
        $sports->team2_id = $request->team_2;
        $sports->start_date_time = $request->start_date;
        $sports->end_date_time = $request->end_date;
        $sports->status = $request->status;
        $sports->description = $request->description;
        $sports->created_by = auth()->user()->id;
        $sports->updated_by = auth()->user()->id;
        $sports->save();
        Session::flash('message', 'Match created successfully.');
        Session::flash('class', 'success');
        return redirect()->route('match.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $sports = Sports::find($request->id);
        $sports->name = $request->name ? $request->name : $sports->name;
        if ($request->icon) {
            $imageName = time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('storage/images/sports'), $imageName);
            $imageName = 'storage/images/sports/' . $imageName;
            $sports->icon = $imageName;
        }
        $sports->status = $request->status;
        $sports->updated_by = auth()->user()->id;
        $sports->save();
        Session::flash('message', 'Match updated successfully.');
        Session::flash('class', 'success');
        return redirect()->route('match.view', $sports->id);
    }

    public function delete($id)
    {
        $sports = Sports::find($id);
        if (!$sports) {
            return $this->respondWithError('Sports not found.');
        }
        $sports->delete();
        return $this->respondWithSuccess('Sports deleted successfully.');
    }
}
