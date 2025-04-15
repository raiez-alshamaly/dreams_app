

{{-- // $fulfilledDreams = Dream::query()->status(DreamStatus::Approved->value)->get(); --}}




    <!-- //TODO : FIX MOVING TICKER JS CODE IN METHOD (setupNewTicker) -->
    @if (isset($fulfilledDreams))
        <div id="news-ticker" class="ticker-wrap">
            <div class="ticker-heading">
                <i class="fas fa-check-circle me-1"></i> أحلام تحققت
            </div>
            <div class="ticker-container">
                <div class="ticker-track">
                    @foreach ($fulfilledDreams as $dream)
                        <div class="ticker-item">
                            <span class="ticker-name">{{ $dream->full_name}}</span>
                            <span class="ticker-amount">{{ $dream->amount }} ل.س</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

<!-- Footer -->
<footer class="footer py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <span class="copyright">
                    جميع الحقوق محفوظة &copy; {{ ' | ' . config('app.name') . ' ' . date('Y') }}
                </span>
            </div>
        </div>
    </div>
</footer>

   
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>

</html>