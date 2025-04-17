@php
    $loaderType = \App\Models\Setting::getValue('loader_type', 'image');
    $loaderText = \App\Models\Setting::getValue('loader_text', 'جاري التحميل...');
    $loaderImage = \App\Models\Setting::getValue('loader_image');
    $loaderVideo = \App\Models\Setting::getValue('loader_video');
@endphp

<x-loader 
    :type="$loaderType"
    :loader-text="$loaderText"
    :image-url="$loaderImage"
    :video-url="$loaderVideo"
/>

@include('layouts.header')

<div class="container mx-auto px-4 py-6 bg-white/5 rounded-lg mt-6 mb-6">
    <h2 class="text-2xl font-bold text-center mb-4">جميع الأحلام</h2>
    <div class="grid grid-cols-1 md:grid-cols-6 gap-3">
        @forelse ($dreams as $dream)
            <x-dream-card :dream="$dream" />
        @empty
            <div class="alert alert-info bg-blue-500/20 border border-blue-500 text-blue-200 text-center p-4 rounded-lg">
                لم يتم إضافة أي أحلام بعد. كن أول من يشارك حلمه!
            </div>
        @endforelse
    </div>
    {{ $dreams->links() ?? '' }}
    <div class="mt-8 bg-gradient-to-r from-blue-900 to-green-900 text-white p-6 rounded-lg text-center">
        <h1 class="text-2xl font-bold mb-2">
            <i class="fas fa-star-half-alt me-2"></i>
            DreamsUP - حقق أحلامك
        </h1>
        <p class="text-gray-200 mb-4">منصة لمشاركة وتحقيق الأحلام، يمكنك مشاركة حلمك وقد يتم اختياره للتحقيق!</p>
        <a href="{{ url('dream/create') }}"
            class="inline-block bg-white text-blue-900 font-semibold px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors">
            <i class="fas fa-plus-circle me-1"></i> شارك حلمك الآن
        </a>
    </div>
</div>

<!-- إضافة CSS وجافاسكربت -->
<style>
    .blurred {
        filter: blur(4px) brightness(0.5);
    }

    .dream-card:hover .label {
        opacity: 1;
    }
</style>

<script>
    function applyBlur(activeCard) {
        document.querySelectorAll('body > *:not(.container)').forEach(el => el.classList.add('blurred'));
        document.querySelectorAll('.dream-card').forEach(card => {
            if (card !== activeCard) {
                card.classList.add('blurred');
            }
        });
    }

    function removeBlur() {
        document.querySelectorAll('.blurred').forEach(el => el.classList.remove('blurred'));
    }
</script>

@include('layouts.footer')