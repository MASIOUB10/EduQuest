@extends('layouts.apps')

@section('content')
<div class="container">
    <h1>Create Lesson</h1>
    <form action="{{ route('lessons.store', $module->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="path">Path (optional)</label>
            <input type="text" name="path" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
