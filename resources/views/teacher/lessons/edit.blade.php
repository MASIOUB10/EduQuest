@extends('layouts.apps')

@section('content')
<div class="container">
    <h1>Edit Lesson</h1>
    <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $lesson->name }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" required>{{ $lesson->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="path">Path (optional)</label>
            <input type="text" name="path" class="form-control" value="{{ $lesson->path }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
