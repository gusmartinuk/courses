@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Content</h1>
    <form action="{{ route('contents.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="lesson_id" class="form-label">Lesson</label>
            <select name="lesson_id" class="form-control" required>
                <option value="">Select a Lesson</option>
                @foreach ($lessons as $lesson)
                    <option value="{{ $lesson->id }}">
                        {{ $lesson->name }} - {{ $lesson->course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Content</button>
    </form>
</div>
@endsection
