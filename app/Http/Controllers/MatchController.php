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
        $tournaments = Tournament::select('id', 'name')->get();
        $teams = Team::select('id', 'name')->get();
        if (!$match) {
            Session::flash('message', 'Match not found');
            Session::flash('class', 'danger');
            return redirect()->route('match.index');
        }
        return view('match.view', compact('match', 'navItem', 'tournaments', 'teams'));
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

        if ($request->start_date) {
            $start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        }
        if ($request->end_date) {
            $end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
        }


        $match = new Matches();
        $match->title = $request->title;
        $match->tournament_id = $request->tournament_id;
        $match->team1_id = $request->team_1;
        $match->team2_id = $request->team_2;
        $match->start_date_time = $start_date;
        $match->end_date_time = $end_date;
        $match->status = $request->status;
        $match->description = $request->description;
        $match->created_by = auth()->user()->id;
        $match->updated_by = auth()->user()->id;
        $match->save();
        Session::flash('message', 'Match created successfully.');
        Session::flash('class', 'success');
        return redirect()->route('match.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        if ($request->start_date) {
            $start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        }
        if ($request->end_date) {
            $end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
        }
        $match = Matches::find($request->id);
        $match->title = $request->title;
        $match->tournament_id = $request->tournament_id ? $request->tournament_id : $match->tournament_id;
        $match->team1_id = $request->team_1 ? $request->team_1 : $match->team1_id;
        $match->team2_id = $request->team_2 ? $request->team_2 : $match->team2_id;
        $match->start_date_time = $request->start_date ? $start_date : $match->start_date_time;
        $match->end_date_time = $request->end_date ? $end_date : $match->end_date_time;
        $match->status = $request->status ? $request->status : $match->status;
        $match->description = $request->description ? $request->description : $match->description;
        $match->created_by = auth()->user()->id;
        $match->updated_by = auth()->user()->id;
        $match->save();
        Session::flash('message', 'Match updated successfully.');
        Session::flash('class', 'success');
        return redirect()->route('match.view', $match->id);
    }

    public function delete($id)
    {
        $match = Matches::find($id);
        if (!$match) {
            return $this->respondWithError('Match not found.');
        }
        $match->delete();
        return $this->respondWithSuccess('Match deleted successfully.');
    }
}
