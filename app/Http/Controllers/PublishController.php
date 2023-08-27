<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // Import the Course model
use App\Models\Lesson; // Import the Lesson model
use App\Models\Content; // Import the Content model


class PublishController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('publish', compact('courses'));
    }
   public function detail($course_id)
    {
        $contents = Content::with('lesson.course')->get();
        return view('detail', compact('contents'));
    }

}
