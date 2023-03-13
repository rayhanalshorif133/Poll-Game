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
            $data = Sports::select()
                ->with('createdBy', 'updatedBy')->get();
            return DataTables::of($data)->addIndexColumn()
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
        $match = Sports::select()
            ->where('id', $id)
            ->with('createdBy', 'updatedBy')->first();
        return view('sports.view', compact('sports', 'navItem'));
    }

    public function store(Request $request)
    {
        dd($request->all());


        /*
        "start_date" => "2023-03-06"
        "end_date" => "2023-03-17"
        "status" => "active"
        "description" => "<p>23233</p>"
        ----------
        'start_time',
        'end_time',
        'status',
        'description',
        'created_by',
        'updated_by',
        */

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
        $sports->status = $request->status;
        $sports->created_by = auth()->user()->id;
        $sports->updated_by = auth()->user()->id;
        $sports->save();
        Session::flash('message', 'Sports created successfully.');
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
