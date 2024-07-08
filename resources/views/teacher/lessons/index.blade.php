@extends('layouts.apps')

@section('content')
<div class="container">
    <h1>Lessons for {{ $module->title }}</h1>
    <a href="{{ route('lessons.create', $module->id) }}" class="btn btn-primary">Create Lesson</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lessons as $lesson)
            <tr>
                <td>{{ $lesson->name }}</td>
                <td>{{ $lesson->content }}</td>
                <td>
                    <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
