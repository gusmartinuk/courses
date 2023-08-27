@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Courses</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>
                        <a href="{{ route('publish.detail', $course->id) }}" class="link-dark">{{ $course->name }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
