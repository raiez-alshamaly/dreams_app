@if ($isEnabled)
<div id="page-loader" class="fixed inset-0 z-50 flex items-center justify-center" style="background-color: {{ $bgColor }};">
    <div class="text-center">
        @if ($imageType === 'image' && $imagePath)
            <img src="{{ asset('storage/' . $imagePath) }}" alt="لودر" class="mx-auto mb-4 max-h-32">
        @elseif ($imageType === 'video' && $videoPath)
            <video autoplay loop muted class="mx-auto mb-4 max-h-32">
                <source src="{{ asset('storage/' . $videoPath) }}" type="video/mp4">
            </video>
        @else
            <div class="loader-spinner mb-4">
                <svg class="animate-spin h-10 w-10 text-{{ $primaryColor }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        @endif
        
        <div id="loader-text" class="animation-{{ $animationType }}" style="color: {{ $textColor }};">
            {{ $loaderText }}
        </div>
    </div>
</div>

<style>
.animation-fade {
    animation: fade-in-out 2s ease-in-out infinite;
}

.animation-slide {
    animation: slide-in-out 2s ease-in-out infinite;
}

.animation-bounce {
    animation: bounce 1s ease-in-out infinite;
}

.animation-pulse {
    animation: pulse 1.5s ease-in-out infinite;
}

.animation-typewriter {
    overflow: hidden;
    border-right: .15em solid;
    white-space: nowrap;
    margin: 0 auto;
    animation: typing 3.5s steps(30, end) infinite, blink-caret .75s step-end infinite;
}

@keyframes fade-in-out {
    0%, 100% { opacity: 0; }
    50% { opacity: 1; }
}

@keyframes slide-in-out {
    0% { transform: translateY(-20px); opacity: 0; }
    50% { transform: translateY(0); opacity: 1; }
    100% { transform: translateY(20px); opacity: 0; }
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

@keyframes typing {
    0% { width: 0 }
    50% { width: 100% }
    90% { width: 100% }
    100% { width: 0 }
}

@keyframes blink-caret {
    from, to { border-color: transparent }
    50% { border-color: currentColor; }
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loader = document.getElementById('page-loader');
        if (loader) {
            // إخفاء اللودر بعد الوقت المحدد
            setTimeout(function() {
                loader.style.opacity = '0';
                loader.style.transition = 'opacity 0.5s ease';
                
                setTimeout(function() {
                    loader.style.display = 'none';
                }, 500);
            }, {{ $displayTime }});
        }
    });
</script>
@endif 