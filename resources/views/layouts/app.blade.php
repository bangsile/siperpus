<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Perpustakaan')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/110a439f2b.js" crossorigin="anonymous"></script>
</head>

<body>
    <livewire:navbar />

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <x-nav-link icon="fa-solid fa-chart-pie" href="{{ route('dashboard') }}"
                    active="{{ Route::is('dashboard') }}">
                    Dashboard
                </x-nav-link>
                <x-nav-link icon="fa-solid fa-users" href="{{ route('users') }}"
                    active="{{ Route::is('users') }}">
                    Pengguna
                </x-nav-link>

                <li class="mt-7">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            class="flex w-full text-left items-center p-2 rounded-lg text-red-400 hover:text-white hover:bg-red-400">
                            <i class="fa-solid fa-right-from-bracket text-lg "></i>
                            <span class="flex-1 ms-3 whitespace-nowrap ">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        {{ $slot }}
    </div>

</body>

</html>
