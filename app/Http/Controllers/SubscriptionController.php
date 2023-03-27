<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $navItem = 'subscription-list';
        if ($request->ajax()) {
            // DISTINCT
            $data = Subscription::select('match_id')
                ->distinct('match_id')
                ->with('match')
                ->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('tournament', function ($row) {
                    $tournament = Tournament::find($row->match->tournament_id);
                    return $tournament->name;
                })
                ->addColumn('subscription', function ($row) {
                    $countOfSubscription = Subscription::select('match_id')
                        ->where('match_id', $row->match_id)
                        ->count();
                    return $countOfSubscription;
                })
                ->addColumn('action', function ($row) {
                    return true;
                })
                ->make(true);
        }

        return view('subscription.index', compact('navItem'));
    }

    public function view($match_id)
    {

        $subscription = Subscription::select()
            ->where('match_id', $match_id)
            ->with('match', 'account', 'match.tournament', 'match.team1', 'match.team2')
            ->get();
        $navItem = 'subscription-list';
        return view('subscription.view', compact('navItem', 'subscription'));
    }

    public function details(Request $request, $match_id)
    {
        if ($request->ajax()) {
            $subscription = Subscription::select()
                ->where('match_id', $match_id)
                ->with('match', 'account', 'match.tournament', 'match.team1', 'match.team2')
                ->get();
            return DataTables::of($subscription)->addIndexColumn()
                ->addColumn('tournament', function ($row) {
                    $tournament = Tournament::find($row->match->tournament_id);
                    return $tournament->name;
                })
                ->addColumn('subscription', function ($row) {
                    $countOfSubscription = Subscription::select('match_id')
                        ->where('match_id', $row->match_id)
                        ->count();
                    return $countOfSubscription;
                })
                ->addColumn('action', function ($row) {
                    return true;
                })
                ->make(true);
        }
    }
}
