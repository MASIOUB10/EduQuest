<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://www.thinkific.com/wp-content/uploads/2022/06/online-learning-student.jpg?original'); /* Replace with your image URL */
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

<body class="bg-gray-100 bg-opacity-50">
    <header class="bg-transparent fixed w-full top-0 left-0 z-10">
        <div class="container mx-auto px-4 py-4">
            <h1 class="text-2xl font-bold text-gray-800">EduQuest</h1>
        </div>
    </header>

    <div class="container mx-auto flex justify-center items-center min-h-screen">
        <div class="max-w-md w-full p-6 bg-white bg-opacity-90 shadow-md rounded-lg mt-16">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" placeholder="Email" required autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" placeholder="Password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
            </form>

            <p class="text-center mt-4">
                <a href="{{ route('register') }}"
                    class="text-blue-500 hover:text-blue-700">Don't have an account? Register</a>
            </p>
        </div>
    </div>

   
</body>

</html>
