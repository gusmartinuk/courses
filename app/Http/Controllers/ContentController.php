<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson; // Import the Lesson model
use App\Models\Course; // Import the Course model
use App\Models\Content; // Import the Content model

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::with('lesson.course')->get();
        return view('contents.index', compact('contents'));
    }


    public function create()
    {
        $lessons = Lesson::with('course')->get(); // Load lessons with their associated courses
        return view('contents.create', compact('lessons'));
    }


    public function store(Request $request)
    {
        Content::create($request->all());
        return redirect()->route('contents.index');
    }


    public function edit(Content $content)
    {
        $lessons = Lesson::with('course')->get(); // Load lessons with their associated courses
        return view('contents.edit', compact('content', 'lessons'));
    }


    public function update(Request $request, Content $content)
    {
        $content->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'), // Ensure this field matches the name attribute of the Trix input
            'lesson_id' => $request->input('lesson_id'),
            'sort_order' => $request->input('sort_order'),
        ]);

        return redirect()->route('contents.index');
    }


    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('contents.index');
    }
}
