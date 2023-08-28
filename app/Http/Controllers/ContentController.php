<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // Import the Course model
use App\Models\Content; // Import the Content model

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::with('course')->get();
        return view('contents.index', compact('contents'));
    }


    public function create()
    {
        $courses = Course::all();
        return view('contents.create', compact('courses'));
    }


    public function store(Request $request)
    {
        Content::create($request->all());
        return redirect()->route('contents.index');
    }


    public function edit(Content $content)
    {
        $courses = Course::all();
        return view('contents.edit', compact('content','courses'));
    }


    public function update(Request $request, Content $content)
    {
        $content->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'), // Ensure this field matches the name attribute of the Trix input
            'course_id' => $request->input('course_id'),
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
