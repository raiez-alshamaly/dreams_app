
<!DOCTYPE html>
<html >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- <x-LaravelThemeCustomizer::theme-css /> --}}
</head>

<body class="">
   

<div class="container ms-5" >
    <livewire:data-table.dream-table />
</div>


</body>
</html>