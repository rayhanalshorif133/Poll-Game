<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule; //import Rule class
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $navItem = "user-list";
        if ($request->ajax()) {
            $data = User::select('id', 'name', 'email')
                ->with('roles')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('role', function ($row) {
                    return true;
                })
                ->addColumn('action', function ($row) {
                    return true;
                })
                ->make(true);
        }

        return view('user.index', compact('navItem'));
    }


    public function view($id)
    {
        $navItem = "user-list";
        $user = User::select('id', 'name', 'email')
            ->where('id', $id)
            ->with('roles')->first();
        return view('user.view', compact('user', 'navItem'));
    }

    public function create()
    {
        $navItem = "user-create";
        $roles = Role::select('id', 'name')->get();
        return view('user.create', compact('roles', 'navItem'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }
    public function edit($id)
    {
        $navBar = "user";
        $user = User::select('id', 'name', 'email')
            ->where('id', $id)
            ->with('roles')->first();
        $roles = Role::select('id', 'name')->get();
        return view('user.edit', compact('roles', 'user', 'navBar'));
    }
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => Rule::unique('users')->ignore($request->id),
            'role' => 'required',
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->save();

        $user->syncRoles($request->role);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }
}
