{{-- شريط الأخبار المتحرك --}}
    <div id="news-ticker"
        class="ticker-wrap fixed bottom-0 w-full bg-gradient-to-r from-[#0c1523] to-[#0f1b2e] shadow-[0_-2px_5px_rgba(0,0,0,0.3)] text-[var(--text-light)] h-10 z-[100] overflow-hidden">
        <div
            class="ticker-heading flex items-center justify-center bg-[var(--accent-color)] text-[var(--text-dark)] font-semibold h-full w-[100px] float-right text-sm">
            <i class="fas fa-check-circle me-1"></i> أحلام تحققت
        </div>
        <div class="ticker-container h-full w-[calc(100%-100px)] overflow-hidden relative float-right">
            <div class="ticker-track flex whitespace-nowrap h-full items-center"
                style="animation: ticker-slide 20s linear infinite;">
                @foreach ($fulfilledDreams as $dream)
                    <div
                        class="ticker-item inline-flex items-center bg-[rgba(255,255,255,0.08)] rounded px-2 py-1 mx-2 shadow-[0_2px_4px_rgba(0,0,0,0.2)] text-[var(--text-light)] h-7 text-sm">
                        <span class="ticker-name font-semibold text-white me-2">{{ $dream->full_name }}</span>
                        <span class="ticker-amount font-semibold text-[var(--accent-color)]">{{ $dream->amount }} ل.س</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


<!-- التذييل -->
<footer class="footer py-2 bg-[var(--dark-background)] text-[var(--text-light)] mt-4">
    <div class="container mx-auto text-center">
        <span class="text-sm">
            جميع الحقوق محفوظة © {{ config('app.name') . ' ' . date('Y') }}
        </span>
    </div>
</footer>

