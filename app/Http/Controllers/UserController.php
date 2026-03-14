<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::with('group')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role'     => 'required|in:student,teacher,administrative',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => $request->role,
            'group_id' => $request->group_id,
        ]);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        return User::with('group')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->except('password'));
        return response()->json($user);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(['message' => 'User deleted']);
    }
}
