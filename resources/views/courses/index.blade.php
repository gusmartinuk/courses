@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->status }}</td>
                <td>
                    <a href="{{ route('lessons.index', $course->id) }}" class="btn btn-primary">Lessons</a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('courses.create') }}" class="btn btn-success">Add New Course</a>
@endsection
