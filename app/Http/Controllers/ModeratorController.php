<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ModeratorController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'role_id' => ['required', 'integer'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'role_id' => $request->input('role_id'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->route('admins.users.moderator')->with('success', 'Moderator added successfully');        
    }

    public function show()
    {
        $records = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select(
                'users.id as user_id',
                'users.first_name',
                'users.last_name',
                'users.username',
                'roles.role_name',
                'users.created_at'
            )
            ->paginate(10);
        return view('admins.users.moderator', compact('records'));
    }

    public function mod_search(Request $request)
    {
        $query = $request->input('search');

        $records = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.role_name', 'like', "%$query%")
            ->orWhere('users.first_name', 'like', "%$query%")
            ->orWhere('users.last_name', 'like', "%$query%")
            ->orWhere('users.username', 'like', "%$query%")
            ->orWhere('users.id', 'like', "%$query%")
            ->select(
                'users.id as user_id',
                'users.first_name',
                'users.last_name',
                'users.username',
                'roles.role_name',
                'users.created_at'
            )
            ->paginate(10);
        return view('admins.users.moderator', compact('records')); // Pass the results to the view
    }

}
