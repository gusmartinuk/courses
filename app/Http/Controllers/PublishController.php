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
   public function detail($course_id,$content_id)
    {
        $contentlist = Content::with('course')->select('title', 'id')->where('course_id','=',$course_id)->get();
        $content = Content::with('course')->where('id', $content_id)->first();
        return view('detail', compact('contentlist','content'));
    }

}
