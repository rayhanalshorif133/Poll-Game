<?php

namespace App\Http\Controllers;

use App\Models\Participate;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Tournament;
use App\Models\Account;
use Illuminate\Support\Facades\Session;

class ParticipateController extends Controller
{
    public function index(Request $request)
    {
        $navItem = 'participate-list';
        if ($request->ajax()) {
            // DISTINCT
            $data = Participate::select('match_id')
                ->distinct('match_id')
                ->with('match')
                ->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('tournament', function ($row) {
                    $tournament = Tournament::find($row->match->tournament_id);
                    return $tournament->name;
                })
                ->addColumn('participate', function ($row) {
                    $countOfParticipate = Participate::select('match_id')
                        ->where('match_id', $row->match_id)
                        ->count();
                    return $countOfParticipate;
                })
                ->addColumn('match_duration', function ($row) {
                    return $row->match->timeDiff($row->match->id);
                })
                ->addColumn('action', function ($row) {
                    return true;
                })
                ->make(true);
        }
        return view('participate.index', compact('navItem'));
    }


    public function view($id)
    {
        $navItem = 'participate-list';
        $participate = Participate::select()
            ->where('match_id', $id)
            ->get();
        if (count($participate) > 0) {
            return view('participate.view', compact('participate', 'navItem'));
        }
        Session::flash('message', 'Participate Not Found');
        Session::flash('class', 'danger');
        return redirect()->route('participate.index');
    }

    public function dayWise(Request $request, $match_id, $day)
    {
        if ($request->ajax()) {
            $participate = Participate::select()
                ->where('match_id', $match_id)
                ->where('days', $day)
                ->with('account')
                ->orderBy('point', 'desc')
                ->get();
            return DataTables::of($participate)
                ->addIndexColumn()
                ->addColumn('count', function ($row) {
                    return $row->count();
                })
                ->make(true);
        }
    }
    public function leaderBoard(Request $request, $match_id)
    {
        if ($request->ajax()) {
            $leaderBoards = new LeaderBoardController();
            $leaderBoards = $leaderBoards->getLeaderBoardData($match_id);
            return DataTables::of($leaderBoards)
                ->addIndexColumn()
                ->make(true);
        }
    }
}
