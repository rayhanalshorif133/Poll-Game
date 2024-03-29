<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PlayerController extends Controller
{
    public function index(Request $request, $operator = null, $start_date = null, $end_date = null)
    {
        $navItem = 'player-list';
        $operators = ["GP", "ROBI", "B-LINK", "T-TALK", "NO"];


        if ($request->ajax()) {
            if ($start_date != null) {
                $start_date = date('Y-m-d', strtotime($start_date));
                $data = Account::select()
                    ->where('created_at', 'LIKE', $start_date . '%')
                    ->get();
            }
            if ($end_date != null) {
                $end_date = date('Y-m-d', strtotime($end_date));
                $data = Account::select()
                    ->where('created_at', 'LIKE', $end_date . '%')
                    ->get();
            }
            if ($start_date == null && $end_date == null) {
                $data = Account::select()->get();
            }
            if ($start_date != null && $end_date != null) {

                if ($start_date > $end_date) {
                    $temp = $start_date;
                    $start_date = $end_date;
                    $end_date = $temp;
                }

                $end_date = date('Y-m-d', strtotime($end_date . ' +1 day'));
                $data = Account::select()
                    ->whereBetween('created_at', [$start_date, $end_date])
                    ->get();
            }

            if ($operator) {
                $operator = [$operator];
                $data = $data->filter(function ($value, $key) use ($operator) {
                    return in_array($value->operator, $operator);
                });
            }

            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return true;
                })
                ->make(true);
        }
        return view('player.index', compact('navItem', 'operators'));
    }
}
