
@extends('layouts.apps')

@section('content')
<div class="container mx-auto mt-4 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Modules</h1>
        <a href="{{ route('modules.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 5a1 1 0 00-1 1v3H6a1 1 0 100 2h3v3a1 1 0 102 0v-3h3a1 1 0 100-2h-3V6a1 1 0 00-1-1z" />
            </svg>
            Create Module
        </a>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Title</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modules as $module)
                <tr>
                    <td class="px-4 py-2 border">{{ $module->title }}</td>
                    <td class="px-4 py-2 border">{{ $module->description }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('modules.edit', $module->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 010 2.828L7.414 15H4v-3.414l10-10a2 2 0 012.828 0z" />
                                </svg>
                            </a>
                            <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 011-1h6a1 1 0 011 1v1h4a1 1 0 110 2h-1v11a2 2 0 01-2 2H5a2 2 0 01-2-2V4H2a1 1 0 110-2h4V2zm4 4a1 1 0 00-1 1v7a1 1 0 102 0V7a1 1 0 00-1-1zM8 7a1 1 0 00-1 1v7a1 1 0 102 0V8a1 1 0 00-1-1zm4 0a1 1 0 00-1 1v7a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
