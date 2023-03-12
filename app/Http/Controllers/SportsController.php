<?php

namespace App\Http\Controllers;

use App\Models\Sports;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SportsController extends Controller
{
    public function index(Request $request)
    {
        $navItem = "sports-list";
        if ($request->ajax()) {
            $data = Sports::select()
                ->with('createdBy', 'updatedBy')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return true;
                })
                ->make(true);
        }

        return view('sports.index', compact('navItem'));
    }

    public function create()
    {
        $navItem = "sports-create";
        return view('sports.create', compact('navItem'));
    }

    public function viewAndEdit($id)
    {
        $navItem = "sports-list";
        $sports = Sports::select()
            ->where('id', $id)
            ->with('createdBy', 'updatedBy')->first();
        return view('sports.view', compact('sports', 'navItem'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);

        $sports = new Sports();
        $sports->name = $request->name;
        if ($request->icon) {
            $imageName = time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('storage/images'), $imageName);
            $imageName = 'storage/images/' . $imageName;
            $sports->icon = $imageName;
        }
        $sports->status = $request->status;
        $sports->created_by = auth()->user()->id;
        $sports->updated_by = auth()->user()->id;
        $sports->save();
        Session::flash('message', 'Sports created successfully.');
        Session::flash('class', 'success');
        return redirect()->route('sports.index');
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
            $request->icon->move(public_path('storage/images'), $imageName);
            $imageName = 'storage/images/' . $imageName;
            $sports->icon = $imageName;
        }
        $sports->status = $request->status;
        $sports->updated_by = auth()->user()->id;
        $sports->save();
        Session::flash('message', 'Sports updated successfully.');
        Session::flash('class', 'success');
        return redirect()->route('sports.view', $sports->id);
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
