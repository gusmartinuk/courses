@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contents</h1>
    <a href="{{ route('contents.create') }}" class="btn btn-primary mb-3">Add Content</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Course Name</th>
                <th>Sort Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
                <tr>
                    <td>{{ $content->title }}</td>
                    <td>{{ optional($content->course)->name }}</td>
                    <td>{{ $content->sort_order }}</td>
                    <td>
                        <a href="{{ route('contents.edit', $content->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('contents.destroy', $content->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this content?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
