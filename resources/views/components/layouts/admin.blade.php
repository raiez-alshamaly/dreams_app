<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} {{ $title ?  "- $title " : " " }} </title>

        <!-- Fonts -->
      
        @vite(['resources/css/app.css', 'resources/js/app.js'])

       
      

       
    </head>
    <body class="font-sans antialiased">
      <x-layouts.admin-header/>
       
        <x-layouts.sidebar />
          

        <div class="w-full lg:ps-64">
          <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            {{ $slot }}
          </div>
        </div>
      
       
        
       
      
    </body>
</html>
