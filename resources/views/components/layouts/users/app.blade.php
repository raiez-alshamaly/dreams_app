@props(['hasFooter' => true])
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <x-LaravelThemeCustomizer::theme-css />
</head>

<body class="font-['Cairo'] bg-color-neutral-700 text-[var(--color-light-50)] leading-relaxed">
    @if (isset($isEnabled) && $isEnabled)
        {!! $loaderHtml !!}
    @endif
    <x-layouts.users.header />
    {{ $slot }}

    @if ($hasFooter)
        <x-layouts.users.footer />
    @endif
</body>

</html>
