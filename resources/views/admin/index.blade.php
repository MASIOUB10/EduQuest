@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-4 p-4 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Courses</h1>
    <a href="{{ route('admin.courses.create') }}" class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M16 10a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm1-7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v1H3a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-2V3zm-2 4v10H5V7h10z"/>
        </svg>
        <span>Create New Course</span>
    </a>
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Title</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <th class="py-3 px-6 text-left">Category</th>
                    <th class="py-3 px-6 text-left">Teacher</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($courses as $course)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $course->title }}</td>
                        <td class="py-3 px-6 text-left">{{ $course->description }}</td>
                        <td class="py-3 px-6 text-left">{{ $course->category->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $course->teacher->name }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                <svg class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M15.293 4.293a1 1 0 0 1 1.414 1.414l-10 10a1 1 0 0 1-1.414 0l-5-5a1 1 0 0 1 1.414-1.414L5 13.586l9.293-9.293z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2">
                                    <svg class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 6a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v1H3V6zm14 2H3v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6zM8 9a1 1 0 0 1 2 0v5a1 1 0 0 1-2 0V9zm4 0a1 1 0 0 1 2 0v5a1 1 0 0 1-2 0V9z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
