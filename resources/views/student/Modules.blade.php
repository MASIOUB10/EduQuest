<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} - Modules</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: white;
            background-color: #001f3f;
            transition: background-color 0.3s ease;
        }
        header {
            background-color: #001f3f;
            padding: 1em 2em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        nav {
            display: flex;
            align-items: center;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        nav a:hover {
            color: #ff5733;
        }
        .mobile-nav {
            display: none;
            width: 100%;
        }
        .mobile-nav select {
            background-color: #001f3f;
            color: white;
            border: none;
            font-weight: bold;
            padding: 0.5em;
            width: 100%;
            margin-top: 1em;
        }
        .content {
            padding: 2em;
            background-color: white;
            color: #001f3f;
            flex: 1;
        }
        .modules {
            display: flex;
            flex-direction: column;
            gap: 1em;
        }
        .module-card {
            background-color: #003366;
            color: white;
            padding: 1em;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .module-card:hover {
            background-color: #004080;
        }
        .lessons {
            display: none;
            flex-direction: column;
            gap: 1em;
            margin-top: 1em;
            padding: 0.5em;
            background-color: #002244;
            border-radius: 10px;
        }
        .lesson-card {
            background-color: #004080;
            color: white;
            padding: 0.5em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .lesson-card:hover {
            background-color: #0059b3;
        }
        .lesson-card a {
            color: white;
            text-decoration: none;
            display: block;
        }
        .lesson-card a:hover {
            text-decoration: underline;
        }
        footer {
            background-color: #001f3f;
            color: white;
            text-align: center;
            padding: 1em 0;
        }
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }
            nav {
                display: none;
            }
            .mobile-nav {
                display: block;
            }
            .course-details {
                padding: 1em;
            }
        }
    </style>
</head>
<body>
<header>
    <h1>EduQuest</h1>
    <nav>
        <a href="{{ route('student.courses.index') }}">Courses</a>
        <a href="{{ url('/') }}">Home</a>
        @guest
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @else
            <a href="{{ route('student.myCourses') }}">My Courses</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </nav>
    <div class="mobile-nav">
        <select onchange="location = this.value;">
            <option value="#">Menu</option>
            <option value="{{ route('student.courses.index') }}">Courses</option>
            <option value="{{ url('/') }}">Home</option>
            @guest
                <option value="{{ route('login') }}">Login</option>
                @if (Route::has('register'))
                    <option value="{{ route('register') }}">Register</option>
                @endif
            @else
                <option value="{{ route('student.myCourses') }}">My Courses</option>
                <option value="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </option>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <option disabled>Logged in as {{ Auth::user()->name }}</option>
            @endguest
        </select>
    </div>
</header>

<section class="content">
    <h1>{{ $course->title }}</h1>
    <h2>Modules</h2>
    <div class="modules">
        @foreach ($modules as $module)
            <div class="module-card" onclick="toggleLessons({{ $module->id }})">
                <h3>{{ $module->title }}</h3>
                <p>{{ $module->description }}</p>
                <div class="lessons" id="lessons-{{ $module->id }}">
                    @foreach ($module->lessons as $lesson)
                        <div class="lesson-card">
                            <a href="{{ route('student.lessons.show', $lesson->id) }}">{{ $lesson->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>

<footer>
    <p>&copy; 2024 EDUPLATFORM. All rights reserved.</p>
</footer>

<script>
    function toggleLessons(moduleId) {
        const lessons = document.getElementById(`lessons-${moduleId}`);
        if (lessons.style.display === "none" || lessons.style.display === "") {
            lessons.style.display = "flex";
        } else {
            lessons.style.display = "none";
        }
    }
</script>

</body>
</html>


<script>
    function toggleLessons(moduleId) {
        const lessons = document.getElementById(`lessons-${moduleId}`);
        if (lessons.style.display === "none" || lessons.style.display === "") {
            lessons.style.display = "flex";
        } else {
            lessons.style.display = "none";
        }
    }
</script>

</body>
</html>
