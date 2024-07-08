@extends('layouts.apps')

@section('content')
<div class="container mx-auto mt-8 p-6 bg-white rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Create Module</h1>
        <form action="{{ route('modules.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 mb-2">Title</label>
                <input type="text" name="title" class="form-input w-full px-3 py-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 mb-2">Description</label>
                <textarea name="description" class="form-textarea w-full px-3 py-2 border rounded-md" required></textarea>
            </div>
            <div class="mb-4">
                <label for="course_id" class="block text-gray-700 mb-2">Course</label>
                <select name="course_id" class="form-select w-full px-3 py-2 border rounded-md" required>
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create</button>
        </form>
    </div>
@endsection
