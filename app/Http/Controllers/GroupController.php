<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return Group::with(['users', 'courses'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'level' => 'required|string|max:50',
        ]);

        return response()->json(Group::create($request->all()), 201);
    }

    public function show($id)
    {
        return Group::with(['users', 'courses'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $group = Group::findOrFail($id);
        $group->update($request->all());
        return response()->json($group);
    }

    public function destroy($id)
    {
        Group::findOrFail($id)->delete();
        return response()->json(['message' => 'Group deleted']);
    }
}
