<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Mechanic Business</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">


    <div class="relative flex flex-col justify-center items-center min-h-screen">
        <img src="{{ asset('Logo-horizontal-noBG-orange.png') }}" alt="Company Logo" class="h-40 mb-4">

        <h1 class="text-4xl font-bold text-amber-500 dark:text-gray-200 mb-8">Welcome to MechMaster</h1>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-12">We provide top-quality automotive services!</p>

        @if (Route::has('login'))
            <div class="p-6 text-center">
                @auth
                    <a href="{{ url('/home') }}"
                        class="btn btn-primary inline-block py-2 px-6 rounded-md text-lg font-semibold transition duration-300 ease-in-out hover:scale-105 bg-amber-500 hover:bg-amber-600 text-white hover:text-white shadow-md mr-4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="btn btn-secondary inline-block py-2 px-6 rounded-md text-lg font-semibold transition duration-300 ease-in-out hover:scale-105 bg-gray-700 text-amber-500 border border-amber-500 hover:text-white hover:bg-amber-600 shadow-md mr-4">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="btn btn-secondary inline-block py-2 px-6 rounded-md text-lg font-semibold transition duration-300 ease-in-out hover:scale-105 bg-gray-700 text-amber-500 border border-amber-500 hover:text-white hover:bg-amber-600 shadow-md">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>

</html>
