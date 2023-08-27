@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ optional($contents[0]->lesson->course)->name  }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Lesson Name</th>
                <th>Title</th>
                <th>Sort Order</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
                <tr data-bs-toggle="collapse" data-bs-target="#row{{$content->id}}-details" aria-expanded="false">
                    <td>{{ optional($content->lesson)->name }}</td>
                    <td>{{ $content->title }}</td>
                    <td>Expand for more details</td>
                </tr>
                <tr>
                    <td colspan="3" class="collapse" id="row{{$content->id}}-details">
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ $content->title }}</h5>
                            </div>
                            <div class="card-body">
                                {!! $content->description !!}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
// $(document).ready(function () {
//     $('.collapse').collapse();
// });
</script>


@endsection
