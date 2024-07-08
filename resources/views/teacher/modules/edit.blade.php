@extends('layouts.apps')

@section('content')
<div class="container mx-auto mt-8 p-4 bg-white rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Edit Module</h1>
        <form action="{{ route('modules.update', $module->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 mb-2">Title</label>
                <input type="text" name="title" class="form-input w-full px-3 py-2 border rounded-md" value="{{ $module->title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 mb-2">Description</label>
                <textarea name="description" class="form-textarea w-full px-3 py-2 border rounded-md" required>{{ $module->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="course_id" class="block text-gray-700 mb-2">Course</label>
                <select name="course_id" class="form-select w-full px-3 py-2 border rounded-md" required>
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $module->course_id ? 'selected' : '' }}>{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </form>
    </div>
@endsection
