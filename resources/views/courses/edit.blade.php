@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Course</h2>
        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" name="name" class="form-control" value="{{ $course->name }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Preparing" {{ $course->status === 'Preparing' ? 'selected' : '' }}>Preparing</option>
                    <option value="Published" {{ $course->status === 'Published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>
@endsection
