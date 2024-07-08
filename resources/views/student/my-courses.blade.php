<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - EDUPLATFORM</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: white;
            background-color: #001f3f; /* Dark Blue */
        }
        body {
            display: flex;
            flex-direction: column;
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
            flex: 1 0 auto; /* Allow the content section to grow and take up the remaining space */
        }
        .courses {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .course-card {
            background-color: #001f3f;
            color: white;
            border-radius: 10px;
            padding: 1em;
            margin: 1em;
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transform and box-shadow transition */
            cursor: pointer;
        }
        .course-card:hover {
            transform: scale(1.05); /* Scale up on hover */
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5); /* White shadow on hover */
        }
        .course-card a {
            color: inherit;
            text-decoration: none;
        }
        .course-card a:hover {
            color: inherit;
        }
        .course-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1em;
        }
        .course-card h3 {
            margin: 0.5em 0;
        }
        .course-card button {
            background-color: #ff5733;
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 1em;
        }
        .course-card button:hover {
            background-color: #ff2e00; /* Darker orange on hover */
        }
        footer {
            background-color: #001f3f;
            color: white;
            text-align: center;
            padding: 1em 0;
            flex-shrink: 0; /* Ensure footer stays at the bottom */
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
            .courses {
                flex-direction: column;
                align-items: center;
            }
            .course-card {
                width: 90%;
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
                <option value="{{ route('student.myCourses') }}">My Courses</option> <!-- Mobile Link to My Courses -->
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
    <h2>Valid Courses</h2>
    <div class="courses">
        @foreach ($validCourses as $validCourse)
            <div class="course-card">
                <img src="{{ $validCourse->course->image }}" alt="{{ $validCourse->course->title }}">
                <h3>{{ $validCourse->course->title }}</h3>
                <p>{{ $validCourse->course->description }}</p>
                <a href="{{ route('student.modules', $validCourse->course->id) }}">
                    <button>Start</button>
                </a>
            </div>
        @endforeach
    </div>

    <h2>Not Valid Courses</h2>
    <div class="courses">
        @foreach ($notValidCourses as $notValidCourse)
            <div class="course-card">
                <img src="{{ $notValidCourse->course->image }}" alt="{{ $notValidCourse->course->title }}">
                <h3>{{ $notValidCourse->course->title }}</h3>
                <p>{{ $notValidCourse->course->description }}</p>
            </div>
        @endforeach
    </div>
</section>

<footer>
    <p>&copy; 2024 EDUPLATFORM. All rights reserved.</p>
</footer>

</body>
</html>
