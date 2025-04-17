@props([
    'type' => 'image',
    'loaderText' => 'جاري التحميل...',
    'imageUrl' => null,
    'videoUrl' => null
])

<div id="loader" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-90">
    <div class="text-center">
        @if($type === 'video' && $videoUrl)
            <video id="loader-video" class="max-w-md mx-auto" autoplay loop muted playsinline>
                <source src="{{ $videoUrl }}" type="video/mp4">
            </video>
        @elseif($type === 'image' && $imageUrl)
            <img src="{{ $imageUrl }}" alt="Loader" class="max-w-md mx-auto">
        @else
            <div class="w-32 h-32 mx-auto">
                <svg class="animate-spin" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        @endif
        
        <div class="mt-4 text-white text-xl font-semibold">
            {{ $loaderText }}
        </div>
    </div>
</div>

<style>
    #loader {
        transition: opacity 0.5s ease-out;
    }
    
    #loader.fade-out {
        opacity: 0;
        pointer-events: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            const loader = document.getElementById('loader');
            loader.classList.add('fade-out');
            setTimeout(() => {
                loader.style.display = 'none';
            }, 500);
        }, 2000); // Show loader for 2 seconds
    });
</script> 