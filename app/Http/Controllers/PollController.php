<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;


class PollController extends Controller
{

    public function index(Request $request)
    {
        $navItem = 'poll-list';
        if ($request->ajax()) {
            $data = Poll::select()
                ->with('match', 'createdBy', 'updatedBy')->get();
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
        return view('poll.index', compact('navItem'));
    }


    public function poll_page($matchId)
    {
        $match = Matches::select()
            ->where('id', $matchId)
            ->with('team1', 'team2', 'tournament', 'tournament.sports', 'tournament.createdBy', 'tournament.updatedBy')->first();
        return view('public.poll.index', compact('match'));
    }

    public function create()
    {
        $navItem = 'poll-create';
        $matches = Matches::select()->get();
        return view('poll.create', compact('navItem', 'matches'));
    }
}
