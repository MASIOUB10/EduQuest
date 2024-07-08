<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuest - Course Details</title>
    
    
</head>
<body>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuest</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex items-center justify-between p-4">
            <h1 class="text-2xl font-bold">EduQuest</h1>
            <nav class="hidden md:flex space-x-4">
                <a href="{{ route('student.courses.index') }}" class="text-gray-700 hover:text-blue-500">Courses</a>
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-500">Home</a>
                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-500">Register</a>
                    @endif
                @else
                    <!-- <a href="{{ route('student.myCourses') }}" class="text-gray-700 hover:text-blue-500">My Courses</a> -->
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-700 hover:text-blue-500">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </nav>
            <div class="md:hidden relative">
                <select onchange="location = this.value;" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option value="#">Menu</option>
                    <option value="{{ route('student.courses.index') }}">Courses</option>
                    <option value="{{ url('/') }}">Home</option>
                    @guest
                        <option value="{{ route('login') }}">Login</option>
                        @if (Route::has('register'))
                            <option value="{{ route('register') }}">Register</option>
                        @endif
                    @else
                        <!-- <option value="{{ route('student.myCourses') }}">My Courses</option> -->
                        <option value="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </option>
                        <option disabled>Logged in as {{ Auth::user()->name }}</option>
                    @endguest
                </select>
            </div>
        </div>
    </header>

    <section class="content container mx-auto mt-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex flex-col lg:flex-row items-center lg:items-start lg:space-x-8">
                <img src="{{ $course->image }}" alt="{{ $course->title }}" class="w-full lg:w-1/3 rounded-lg shadow-md mb-4 lg:mb-0">
                <div class="w-full lg:w-2/3">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $course->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $course->description }}</p>
                    <p class="text-gray-600 mb-4">Teacher: {{ $course->teacher->name }}</p>
                    <p class="text-gray-600 mb-4">Modules: {{ $course->modules->count() }}</p>
                    <form action="{{ route('student.courses.enroll', $course->id) }}" method="POST">
                        @csrf
                        <!-- <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Enroll Now
                        </button> -->
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>


