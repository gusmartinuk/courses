<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson; // Import the Lesson model
use App\Models\Course; // Import the Lesson model

class LessonController extends Controller
{
    public function index($course_id)
    {
        $course = Course::find($course_id);
        // Fetch lessons based on the course_id
        $lessons = Lesson::where('course_id', $course_id)->get();
        return view('lessons.index', compact('lessons','course', 'course_id'));
    }

    public function create($course_id)
    {
        $course = Course::find($course_id);

        // Retrieve lessons filtered by course_id and sorted by sort_order
        $lessons = Lesson::where('course_id', $course_id)
            ->orderBy('sort_order')
            ->get();

        return view('lessons.create', compact('course_id', 'course', 'lessons'));
    }

    public function store(Request $request)
    {
        Lesson::create($request->all());
        return redirect()->route('lessons.index', ['course_id' => $request->input('course_id')]);
    }

    public function edit($course_id, Lesson $lesson)
    {
        $course = Course::find($course_id);

        // Retrieve lessons filtered by course_id and sorted by sort_order
        $lessons = Lesson::where('course_id', $course_id)
            ->orderBy('sort_order')
            ->get();

        return view('lessons.edit', compact('lesson', 'course_id', 'lessons'));
    }
    public function update(Request $request, $course_id, Lesson $lesson)
    {
        $lesson->update($request->all());
        return redirect()->route('lessons.index', ['course_id' => $course_id]);
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lessons.index', ['course_id' => $lesson->course_id]);
    }
}
