<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite('resources/css/app.css')
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{-- {{ $slot }} --}}
                {{-- <div class="container">
                    <div class="row"></div>

                    @yield('content')
                </div> --}}
                {{-- <div class="container">
                    <div class="row flex">
                        <div class="col-md-3">
                            @include('profile.partials.sidebar')
                        </div>
                        <div class="col-md-9">
                            @yield('content')
                        </div>
                    </div>
                </div> --}}
                <div class="flex gap-3">
                    <div class="flex-none w-1/6 bg-sky-500 mx-auto px-4">
                        @include('profile.partials.sidebar')
                    </div>
                    <div class="flex-initial w-full ...">
                        @yield('content')
                    </div>

                  </div>




            </main>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</html>
