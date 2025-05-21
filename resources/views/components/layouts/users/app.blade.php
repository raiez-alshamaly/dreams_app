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
    <div class="fixed inset-0 -z-10 bg-[linear-gradient(to_right,var(--color-secondary-600),var(--color-primary-400))] overflow-hidden">
  <div class="absolute inset-0">
    <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
      <g fill="white" fill-opacity="0.05">
        <circle cx="10" cy="100" r="1">
          <animate attributeName="cy" values="100;0" dur="10s" repeatCount="indefinite" begin="0s" />
          <animate attributeName="r" values="1;3;1" dur="10s" repeatCount="indefinite" begin="0s" />
        </circle>
        <circle cx="30" cy="100" r="1">
          <animate attributeName="cy" values="100;0" dur="12s" repeatCount="indefinite" begin="2s" />
          <animate attributeName="r" values="1;4;1" dur="12s" repeatCount="indefinite" begin="2s" />
        </circle>
        <circle cx="60" cy="100" r="1">
          <animate attributeName="cy" values="100;0" dur="9s" repeatCount="indefinite" begin="1s" />
          <animate attributeName="r" values="1;5;1" dur="9s" repeatCount="indefinite" begin="1s" />
        </circle>
        <circle cx="80" cy="100" r="1">
          <animate attributeName="cy" values="100;0" dur="11s" repeatCount="indefinite" begin="3s" />
          <animate attributeName="r" values="1;2.5;1" dur="11s" repeatCount="indefinite" begin="3s" />
        </circle>
        <circle cx="80" cy="100" r="1">
          <animate attributeName="cy" values="100;0" dur="10s" repeatCount="indefinite" begin="1s" />
          <animate attributeName="r" values="1;5.5;1" dur="10s" repeatCount="indefinite" begin="1s" />
        </circle>
      </g>
    </svg>
  </div>
</div>


</body>

</html>
