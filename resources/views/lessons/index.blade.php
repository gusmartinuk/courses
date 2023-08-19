@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $course->name }}</h1>
    <h2>Lessons</h2>
    <a href="{{ route('lessons.create', ['course_id' => $course_id]) }}" class="btn btn-primary mb-3">Add Lesson</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Sort Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons->where('parent_id', null) as $lesson)
                    @include('lessons.partials.lesson', ['lesson' => $lesson])
            @endforeach
        </tbody>
    </table>
</div>
@endsection
