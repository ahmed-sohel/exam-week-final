<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased dark:text-white/50">
    <header class="w-11/12 mx-auto flex justify-around">
        <a href="{{ route('home') }}" class="block">
            <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="h-16" />
        </a>
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 items-center justify-end">
                {{-- @auth --}}
                <a href="{{ route('about') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                    About
                </a>
                <a href="{{ route('contact') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                    Contact
                </a>
                @if (Auth::user() && Auth::user()->role == 'customer')
                    {{-- <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Dashboard
                    </a> --}}
                    @include('frontend-layout.navigation')
                    {{-- @endif --}}
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                            Register
                        </a>
                    @endif
                @endauth
        </nav>
    @endif
</header>
@yield('content')

</body>

</html>
