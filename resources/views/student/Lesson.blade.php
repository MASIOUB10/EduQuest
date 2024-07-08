<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lesson->name }}</title>
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
        .lesson-content {
            background-color: #003366;
            color: white;
            padding: 1em;
            border-radius: 10px;
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
        }
    </style>
</head>
<body>

<header>
    <h1>EDUPLATFORM</h1>
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
            <option value="{{ url('/') }}">Home</option>
            @guest
                <option value="{{ route('login') }}">Login</option>
                @if (Route::has('register'))
                    <option value="{{ route('register') }}">Register</option>
                @endif
            @else
                <option value="{{ route('student.myCourses') }}">My Courses</option>
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
    <h1>{{ $lesson->name }}</h1>
    <div class="lesson-content">
        {!! $lesson->content !!}
        <br>
        @if($lesson->path)
        
        <iframe width="100%" height="500" src="{{ asset($lesson->path) }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <h1>{{ asset($lesson->path) }}</h1>
        @endif
    </div>
</section>

<footer>
    <p>&copy; 2024 EDUPLATFORM. All rights reserved.</p>
</footer>

</body>
</html>
