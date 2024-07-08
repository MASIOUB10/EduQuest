<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    
  
<body>
    <div id="app">
    <nav class="bg-white shadow-sm">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <a class="text-xl font-semibold text-gray-800" href="#">
                        EduQuest
                    </a>
                    <button class="block lg:hidden text-gray-800 focus:outline-none" onclick="toggleNavbar()">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div class="hidden lg:flex lg:items-center lg:w-auto" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="flex flex-col lg:flex-row lg:items-center lg:mr-auto">
                            <li class="nav-item">
                                <span class="navbar-text text-gray-800">{{ $header ?? '....' }}</span>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="flex flex-col lg:flex-row lg:items-center lg:ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link text-gray-800 hover:text-gray-600" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-gray-800 hover:text-gray-600" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown relative">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-gray-800 hover:text-gray-600 cursor-pointer" onclick="toggleDropdown()">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu absolute right-0 hidden mt-2 w-48 bg-white rounded-md shadow-lg z-10" id="dropdown">
                                        <a class="dropdown-item block px-4 py-2 text-gray-800 hover:bg-gray-200" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script>
        function toggleNavbar() {
            const nav = document.getElementById('navbarSupportedContent');
            nav.classList.toggle('hidden');
        }

        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        }
    </script>
</body>
</html>
