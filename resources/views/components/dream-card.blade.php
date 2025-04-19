
    <div class="card dream-card bg-white/5 rounded-lg shadow-lg hover:shadow-xl hover:scale-110 transition-all duration-300 relative z-10"
        onmouseenter="applyBlur(this)" onmouseleave="removeBlur()">
      
        <div
            class="label absolute -top-8 center-x -translate-x-1/2 bg-black/80 text-yellow-400 text-sm px-2 py-1 rounded pointer-events-none whitespace-nowrap opacity-0 transition-opacity duration-300">
            {{ $dream->full_name }}
            <span
                class="absolute center-x  -bottom-1.5 -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-l-transparent border-r-transparent border-t-black/80"></span>
        </div>

        @if (!empty($dream->image_path))
            <div class="dream-image w-full h-full bg-cover bg-center rounded shadow">
                <img src="{{ asset('storage/' . $dream->image_path) }}" alt="{{ $dream->full_name }}"   >
                {{-- style="background-image: url('{{ config('app.app_url') . '/storage/uploads/' . $dream->image_path }}')"> --}}
            </div>
        @else
            <div
                class="dream-image w-full h-full bg-gray-500 rounded shadow flex items-center justify-center text-gray-300">
                لا توجد صورة
            </div>
        @endif
    </div>
