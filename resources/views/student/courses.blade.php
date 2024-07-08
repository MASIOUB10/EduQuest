<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuest</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles can be added here if needed */
    </style>
</head>
<body class="bg-gray-100">

<header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">EduQuest</h1>
        <nav>
            <div class="md:hidden">
                <button id="menu-button" class="focus:outline-none">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <ul id="menu" class="hidden md:flex space-x-4">
                <li><a href="{{ route('student.courses.index') }}" class="text-gray-600 hover:text-gray-800">Courses</a></li>
                <li><a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-800">Home</a></li>
                @guest
                    <li><a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Register</a></li>
                    @endif
                @else
                    <!-- <li><a href="{{ route('student.myCourses') }}" class="text-gray-600 hover:text-gray-800">My Courses</a></li> -->
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-600 hover:text-gray-800">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>
        </nav>
    </div>
</header>

<section class="content mt-8 mx-auto px-4">
    <div class="search-filter mb-6">
        <div class="flex justify-between items-center">
            <div class="w-full md:w-1/2 mr-4 mb-4 md:mb-0">
                <form action="{{ route('student.courses.index') }}" method="GET">
                    <div class="relative">
                        <input type="text" name="search" placeholder="Search by title" value="{{ request('search') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                        <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l5-5m0 0l-5-5m5 5H4"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <div class="w-full md:w-1/2">
                <form action="{{ route('student.courses.index') }}" method="GET">
                    <div class="relative">
                        <select name="category" onchange="this.form.submit()" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-md leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-6">
        @foreach ($courses as $course)
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $course->title }}</h3>
            <p class="text-gray-600 mb-4">{{ $course->description }}</p>
            <div class="flex justify-center">
            <a href="{{ route('student.courses.show', $course->id) }}" class="block bg-blue-500 hover:bg-blue-600 lg:w-1/4 text-white font-bold py-2 px-4 rounded text-center">Register</a>
            </div>
        </div>
        @endforeach
    </div>
</section>



<script>
    document.getElementById('menu-button').addEventListener('click', function () {
        var menu = document.getElementById('menu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    });
</script>

</body>
</html>
