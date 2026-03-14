<?php

namespace App\Http\Controllers;

use App\Models\RoboticsKit;
use Illuminate\Http\Request;

class RoboticsKitController extends Controller
{
    public function index()
    {
        return RoboticsKit::with('courses')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:150',
            'description' => 'nullable|string',
            'brand'       => 'nullable|string|max:100',
        ]);

        return response()->json(RoboticsKit::create($request->all()), 201);
    }

    public function show($id)
    {
        return RoboticsKit::with('courses')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $kit = RoboticsKit::findOrFail($id);
        $kit->update($request->all());
        return response()->json($kit);
    }

    public function destroy($id)
    {
        RoboticsKit::findOrFail($id)->delete();
        return response()->json(['message' => 'Kit deleted']);
    }
}
