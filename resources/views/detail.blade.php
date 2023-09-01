@extends('layouts.pub')

@section('sidebar')
    @foreach ($contentlist as $url)
        <li class="nav-item">
            <a href="/pub/{{ $content->course_id }}/{{ $url->id }}" class="nav-link px-2 text-truncate {{ $content->id === $url->id ? 'active' : '' }}">
                <i class="bi bi-house fs-5"></i>
                <span class="d-none d-sm-inline">{{ $url->title }}</span>
            </a>
        </li>
    @endforeach
@endsection

@section('content')
    <h5>{{ $content->title }}</h5>
    {!! $content->description !!}
    <div>
        @if ($previousContent)
            <a href="{{ route('publish.detail', ['course_id' => $content->course_id, 'content_id' => $previousContent->id]) }}" class="btn btn-primary">Previous</a>
        @endif

        @if ($nextContent)
            <a href="{{ route('publish.detail', ['course_id' => $content->course_id, 'content_id' => $nextContent->id]) }}" class="btn btn-primary">Next</a>
        @endif
    </div>
@endsection
