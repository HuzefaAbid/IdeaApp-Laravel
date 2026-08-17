@props([
    'heading' => null,
    'title' => 'IdeaHub',
])

<!DOCTYPE html>
<html lang="en" data-theme="dracula" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="h-full bg-base-300 text-base-content flex flex-col min-h-screen antialiased">
    <!-- Navbar -->
    <header class="bg-slate-800/80 backdrop-blur border-b border-slate-700/60 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 flex items-center justify-between h-16">
            <!-- Brand Logo -->
            <a href="/ideas"
                class="flex items-center gap-2 font-bold text-lg text-indigo-400 hover:text-indigo-300 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
                <span>IdeaHub</span>
            </a>

            <!-- Navigation Links & Action Button -->
            <div class="flex items-center gap-2 sm:gap-3">
                <nav class="flex items-center gap-1 text-sm font-medium">
                    <a href="/"
                        class="px-3 py-2 rounded-md {{ request()->is('/') ? 'bg-slate-700 text-white font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }} transition">Home</a>
                    <a href="/ideas"
                        class="px-3 py-2 rounded-md {{ request()->is('ideas*') ? 'bg-slate-700 text-white font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }} transition">Ideas</a>
                    <a href="/about"
                        class="px-3 py-2 rounded-md {{ request()->is('about') ? 'bg-slate-700 text-white font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }} transition">About</a>
                    <a href="/contact"
                        class="px-3 py-2 rounded-md {{ request()->is('contact') ? 'bg-slate-700 text-white font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }} transition">Contact</a>
                </nav>

                @auth
                    <a href="{{ route('ideas.create') }}"
                        class="hidden sm:inline-flex items-center gap-1.5 bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-semibold px-3 py-2 rounded-lg shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        New Idea
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-3 py-1.5 text-xs font-semibold rounded-lg bg-slate-700 hover:bg-slate-600 text-slate-200 transition cursor-pointer">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('register') }}"
                        class="btn btn-sm btn-outline border-slate-600 text-slate-200 hover:bg-indigo-600 hover:border-indigo-600 hover:text-white transition">
                        Register
                    </a>
                    <a href="{{ route('login') }}"
                        class="btn btn-sm btn-outline border-slate-600 text-slate-200 hover:bg-indigo-600 hover:border-indigo-600 hover:text-white transition">
                        login
                    </a>

                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="flex-grow max-w-4xl w-full mx-auto px-4 sm:px-6 py-8">
        @if ($heading)
            <div class="mb-6">
                <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white capitalize">{{ $heading }}</h1>
            </div>
        @endif

        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800 py-6 text-center text-xs text-slate-500">
        <p>&copy; {{ date('Y') }} IdeaHub. Built with Laravel & Tailwind CSS.</p>
    </footer>
</body>

</html>
