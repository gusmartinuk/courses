@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Content</h1>
    <form action="{{ route('contents.update', $content->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $content->title }}" required>
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Courses</label>
            <select name="course_id" class="form-control" required>
                <option value="">Select related Course</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $content->course_id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <div id="editor" style="height: 400px;">{!! $content->description !!}</div>
            <input type="hidden" id="editor-input" name="description" value="{{ $content->description }}">
        </div>
        <div class="mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="{{ $content->sort_order }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Content</button>
    </form>
</div>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['link', 'image'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['clean']
            ]
        }
    });

    var editorInput = document.getElementById('editor-input');
    quill.on('text-change', function() {
        editorInput.value = quill.root.innerHTML;
    });
</script>

@endsection
