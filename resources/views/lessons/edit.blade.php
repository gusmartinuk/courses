@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Lesson</h1>
    <form action="{{ route('lessons.update', ['course_id' => $course_id, 'lesson' => $lesson->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="course_id" value="{{ $course_id }}">
        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Lesson</label>
            <select name="parent_id" class="form-control">
                <option value="">No Parent</option>
                @foreach ($lessons as $availableLesson)
                    <option value="{{ $availableLesson->id }}" {{ $lesson->parent_id == $availableLesson->id ? 'selected' : '' }}>
                        {{ $availableLesson->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $lesson->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $lesson->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="{{ $lesson->sort_order }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Lesson</button>
    </form>
</div>
@endsection
