<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Loader</title>
       <style>
           body {
               background: {{ $style === 'dark' ? '#333' : ($style === 'light' ? '#f0f0f0' : '#fff') }};
               color: {{ $style === 'dark' ? '#fff' : '#000' }};
               display: flex;
               justify-content: center;
               align-items: center;
               height: 100vh;
               margin: 0;
           }
           img, video { max-width: 100%; max-height: 80vh; }
       </style>
   </head>
   <body>
       @if ($contentType === 'video')
           <video autoplay muted>
               <source src="{{ $content }}" type="video/mp4">
           </video>
       @elseif ($contentType === 'image')
           <img src="{{ $content }}" alt="Loader Image">
       @else
           <p>{{ $content }}</p>
       @endif

       <script>
           setTimeout(() => {
               window.location.href = "{{ $target }}";
           }, {{ $duration * 1000 }});
       </script>
   </body>
   </html>