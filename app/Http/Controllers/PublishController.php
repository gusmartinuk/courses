<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // Import the Course model
use App\Models\Content; // Import the Content model


class PublishController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('publish', compact('courses'));
    }
    public function detail($course_id, $content_id)
    {
        // Get the current content
        $content = Content::with('course')->where('id', $content_id)->first();

        // Get the previous content
        $previousContent = Content::with('course')
            ->where('course_id', $course_id)
            ->where('sort_order', '<', $content->sort_order)
            ->orderBy('sort_order', 'desc')
            ->first();

        // Get the next content
        $nextContent = Content::with('course')
            ->where('course_id', $course_id)
            ->where('sort_order', '>', $content->sort_order)
            ->orderBy('sort_order', 'asc')
            ->first();



        $contentlist = Content::with('course')->select('title', 'id')->where('course_id','=',$course_id)->orderBy('sort_order', 'asc')->get();

        return view('detail', compact('content', 'previousContent', 'nextContent','contentlist'));
    }

}
