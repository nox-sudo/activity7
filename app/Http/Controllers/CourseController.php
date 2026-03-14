<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return Course::with(['roboticsKit', 'groups'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_key'       => 'required|string|max:20|unique:courses',
            'title'            => 'required|string|max:200',
            'cover'            => 'nullable|string|max:255',
            'content'          => 'nullable|string',
            'didactic_material'=> 'nullable|string',
            'kit_id'           => 'required|exists:robotics_kits,id',
        ]);

        return response()->json(Course::create($request->all()), 201);
    }

    public function show($id)
    {
        return Course::with(['roboticsKit', 'groups'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());
        return response()->json($course);
    }

    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return response()->json(['message' => 'Course deleted']);
    }
}
