<tr>
    <td>{{ $lesson->name }}</td>
    <td>{{ $lesson->description }}</td>
    <td>{{ $lesson->sort_order }}</td>
    <td>
        <a href="{{ route('lessons.edit', ['course_id' => $course_id, 'lesson' => $lesson->id]) }}" class="btn btn-sm btn-primary">Edit</a>
        <form action="{{ route('lessons.destroy', ['lesson' => $lesson, 'course_id' => $course_id]) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this lesson?')">Delete</button>
        </form>
    </td>
</tr>
@if ($lesson->children->count() > 0)
    <tr>
        <td colspan="4">
            <table class="table">
                <tbody>
                    @foreach ($lesson->children as $child)
                        @include('lessons.partials.lesson', ['lesson' => $child])
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
@endif
