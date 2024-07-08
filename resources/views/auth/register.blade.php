<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - EduQuest</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles for background image and transparent header */
        .bg-cover {
            background-image: url('https://www.insidehighered.com/sites/default/files/styles/max_650x650/public/2023-11/GettyImages-1455291834%20%281%29.jpg?itok=31NSxXaC');
            background-size: cover;
            background-position: center;
        }
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

<body class="bg-cover h-screen bg-gray-100">
    <header class="bg-transparent fixed w-full">
        <div class="container mx-auto px-4 py-4">
            <h1 class="text-2xl font-bold text-white">EduQuest</h1>
        </div>
    </header>

    <div class="container mx-auto flex justify-center items-center h-full">
        <div class="max-w-md w-full p-6 bg-white shadow-md rounded-lg mt-20">
            <h2 class="text-2xl font-bold mb-6 text-center">Create an Account</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" type="text" name="name" placeholder="Name" required autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" placeholder="Email" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" placeholder="Password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        placeholder="Confirm Password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Register</button>
            </form>

            <p class="text-center mt-4">
                <a href="{{ route('login') }}"
                    class="text-blue-500 hover:text-blue-700">Already have an account? Login</a>
            </p>
        </div>
    </div>
</body>

</html>
