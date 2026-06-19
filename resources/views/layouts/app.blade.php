<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex">
    <title>{{ config('app.name', 'Laravel Default Value') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('script-head')

    <style>
        .debug-border {
            border: 1px solid tomato;
        }

        .debug-border * {
            border: 1px solid tomato;
        }

        /* For Webkit-based browsers (Chrome, Safari and Opera) */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* For IE, Edge and Firefox */
        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
    @stack('style')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-900">
        @include('layouts.navigation')

        @auth
            <div class="bg-gray-800 text-white max-w-6xl mx-auto lg:px-0 mb-1">
                <div class="text-yellow-400 border-yellow-700 border-l-8 p-2 bg-yellow-400 bg-opacity-30">
                    Welcome <span class="text-white font-semibold">{{ Auth::user()->name }}</span>!
                </div>
            </div>
        @endauth

        <main>
            {{ $slot }}
        </main>
    </div>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    @stack('script')
</body>

</html>
