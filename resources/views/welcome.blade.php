<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RudetConnect</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* Include your custom styles here */
            </style>
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <h1 class="text-4xl font-bold text-black dark:text-white">Rudet Connect</h1>
                        </div>
                    </header>

                    <main class="mt-6 text-center">
                        <p class="text-xl text-gray-700 dark:text-gray-300">
                            MyApp is a revolutionary application designed to simplify your life. Explore our features and get started today!
                        </p>

                        <div class="mt-8 flex justify-center gap-4">
                            <a href="{{ route('login') }}" class="rounded-md px-4 py-2 bg-white text-black border border-black hover:bg-gray-700 transition">Prijava</a>
                            <a href="{{ route('register') }}" class="rounded-md px-4 py-2 bg-green-500 text-white hover:bg-green-700 transition">Registracija</a>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        RudetConnect v1.0 (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
