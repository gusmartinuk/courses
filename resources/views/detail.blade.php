@extends('layouts.pub')

@section('sidebar')
    @foreach ($contentlist as $url)
        <li class="nav-item">
            <a href="/pub/{{ $content->course_id }}/{{ $url->id }}" class="nav-link px-2 text-truncate">
                <i class="bi bi-house fs-5"></i>
                <span class="d-none d-sm-inline">{{ $url->title }} </span>
            </a>
        </li>
    @endforeach
@endsection

@section('content')
    <h5>{{ $content->title }}</h5>
    {!! $content->description !!}
@endsection
