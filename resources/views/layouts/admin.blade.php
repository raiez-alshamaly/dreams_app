<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - لوحة التحكم</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-cairo antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-[var(--dark-background)] text-white">
            <div class="p-4">
                <h1 class="text-xl font-bold">{{ config('app.name') }}</h1>
            </div>
            <nav class="mt-4">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-[var(--accent-color)] {{ request()->routeIs('dashboard') ? 'bg-[var(--accent-color)]' : '' }}">
                    <i class="fas fa-home ml-2"></i>
                    الرئيسية
                </a>
                <a href="{{ route('admin.settings.index') }}" class="block px-4 py-2 hover:bg-[var(--accent-color)] {{ request()->routeIs('admin.settings.*') ? 'bg-[var(--accent-color)]' : '' }}">
                    <i class="fas fa-cog ml-2"></i>
                    إعدادات الموقع
                </a>
                <a href="{{ route('theme-settings.edit') }}" class="block px-4 py-2 hover:bg-[var(--accent-color)] {{ request()->routeIs('theme-settings.*') ? 'bg-[var(--accent-color)]' : '' }}">
                    <i class="fas fa-palette ml-2"></i>
                    إعدادات المظهر
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <div class="bg-white shadow">
                <div class="px-4 py-3 flex justify-between items-center">
                    <h2 class="text-xl font-semibold">@yield('title', 'لوحة التحكم')</h2>
                    <div class="flex items-center">
                        <span class="ml-4">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="ml-4">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-sign-out-alt ml-1"></i>
                                تسجيل الخروج
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
</body>
</html> 