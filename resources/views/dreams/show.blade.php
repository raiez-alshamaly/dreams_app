<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-LaravelThemeCustomizer::theme-css />
</head>
<body>
    <div class="container ms-5">
        <div class="max-w-3xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">
            <div class="max-w-2xl">
                <!-- Images Section -->
                <div class="flex flex-wrap mb-6">
                    <figure class="w-full md:w-1/2">
                        <img class="w-full object-cover rounded-xl" src="{{ asset('storage/' . $dream->image_path) }}" alt="{{ $dream->full_name }}">
                    </figure>
                    @auth
                        <figure class="w-full md:w-1/2">
                            <img class="w-full object-cover rounded-xl" src="{{ asset('storage/' . $dream->id_image_path) }}" alt="{{ $dream->full_name }}">
                        </figure>
                    @endauth
                </div>
                <!-- Auth Section (Placeholder) -->
                @auth
                    <div class="mb-6 bg-white shadow rounded-lg p-6">
                        <p>Authenticated user info will be here.</p>
                    </div>
                @endauth
                <!-- Dream Details -->
                <div class="space-y-5 md:space-y-8 bg-white shadow rounded-lg p-6">
                    <h2 class="text-2xl font-bold md:text-3xl">{{ $dream->full_name }}</h2>
                    <p class="text-lg text-gray-800">{{ $dream->description }}</p>
                    <p class="text-lg text-gray-800">Amount: {{ $dream->amount }}</p>
                    @if(isset($dream->budget))
                        <p class="text-lg text-gray-800">Budget: {{ $dream->budget }}</p>
                    @endif
                    @if(isset($dream->status))
                        <p class="text-lg text-gray-800">Status: {{ $dream->status }}</p>
                    @endif
                </div>
                <!-- Additional Content -->
                <div class="space-y-3 mt-6">
                    <h3 class="text-2xl font-semibold">Bringing the culture of sharing to everyone</h3>
                    <p class="text-lg text-gray-800">We know the power of sharing is real, and we want to create an opportunity for everyone to try Preline and explore how transformative open communication can be. Now you can have a team of one or two designers and unlimited spectators (think PMs, management, marketing, etc.) share work and explore the design process earlier.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>