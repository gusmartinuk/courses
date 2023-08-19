@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Course</h2>
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Preparing">Preparing</option>
                    <option value="Published">Published</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Course</button>
        </form>
    </div>
@endsection
