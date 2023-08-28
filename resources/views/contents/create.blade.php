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
            <label for="course_id" class="form-label">Courses</label>
            <select name="course_id" class="form-control" required>
                <option value="">Select a Lesson</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <div id="editor" style="height: 400px;"></div>
            <input type="hidden" id="editor-input" name="description" value="">
        </div>
        <div class="mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Content</button>
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
