<!-- resources/views/student/lessons.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $module->title }} - Lessons</title>
    <style>
               body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: white;
            background-color: #001f3f; /* Dark Blue */
            transition: background-color 0.3s ease; /* Smooth background color transition */
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
            transition: color 0.3s ease; /* Smooth color transition */
        }
        nav a:hover {
            color: #ff5733; /* Orange color on hover */
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
        }
        .course-details {
            max-width: 800px;
            margin: 0 auto;
            background-color: #001f3f;
            color: white;
            padding: 2em;
            border-radius: 10px;
        }
        .course-details img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .course-details h2 {
            margin-top: 1em;
        }
        .course-details p {
            margin: 1em 0;
        }
        .course-details button {
            background-color: #ff5733;
            color: white;
            border: none;
            padding: 0.5em 1em;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .course-details button:hover {
            background-color: #ff2e00; /* Darker orange on hover */
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
    <h1>EDUPLATFORM</h1>
    <nav>
        <a href="{{ route('student.courses.index') }}">Courses</a>
        <a href="{{ url('/') }}">Home</a> <!-- Link to return to index page -->
        @guest
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @else
            <a href="{{ route('student.myCourses') }}">My Courses</a> <!-- Link to My Courses -->
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
            <option value="{{ url('/') }}">Home</option> <!-- Link to return to index page -->
            @guest
                <option value="{{ route('login') }}">Login</option>
                @if (Route::has('register'))
                    <option value="{{ route('register') }}">Register</option>
                @endif
            @else
                <!-- <option value="{{ route('student.myCourses') }}">My Courses</option> Mobile Link to My Courses -->
                <option value="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
<h1>{{ $module->title }}</h1>
    <h2>Lessons</h2>
    <div class="lessons">
        @foreach ($lessons as $lesson)
            <div class="lesson-card">
                <h3>{{ $lesson->name }}</h3>
                <a href="{{ route('student.lesson.show', $lesson->id) }}">
                    <button>View Lesson</button>
                </a>
            </div>
        @endforeach
    </div>
</section>

<footer>
    <p>&copy; 2024 EDUPLATFORM. All rights reserved.</p>
</footer>

</body>
</html>
