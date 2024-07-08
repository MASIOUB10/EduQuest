<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuest</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .hero {
            background-image: url('https://pedagoo.com/wp-content/uploads/2020/06/2250x1500_czy-warto-korzystac-ze-szkolen-online-ollh.jpg');
            background-size: cover;
            background-position: center;
        }

        /* Style for transparent header with shadow */
        header {
            background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
            backdrop-filter: blur(10px); /* Blur effect for modern browsers */
            -webkit-backdrop-filter: blur(10px); /* Blur effect for older WebKit browsers */
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 10; /* Ensure it's on top of other content */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow for header */
        }
    </style>
</head>
<body class="bg-gray-100">

<header class=" shadow-md">
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
                @guest
                    <li><a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Register</a></li>
                    @endif
                @else
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="text-gray-600 hover:text-gray-800">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>
        </nav>
    </div>
</header>

<section class="hero h-screen flex items-center justify-center text-white px-4">
    <div class="text-center bg-gray-900 bg-opacity-50 p-4 rounded">
        <h1 class="text-4xl md:text-6xl font-bold">Education is the Key to Success</h1>
    </div>
</section>

<!-- Uncomment this section if you want to include categories -->
<!-- <section class="categories py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="category bg-blue-500 text-white p-4 text-center rounded">Chemistry</div>
            <div class="category bg-green-500 text-white p-4 text-center rounded">Software Development</div>
            <div class="category bg-red-500 text-white p-4 text-center rounded">Architecture</div>
            <div class="category bg-yellow-500 text-white p-4 text-center rounded">Geography</div>
        </div>
    </div>
</section> -->

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
