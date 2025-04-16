
<div class="col">
    <div class="card dream-card h-100 bg-white/5 rounded-lg shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 {{ $dream->status === 'fulfilled' ? 'fulfilled-dream' : '' }}">
        <div class="card-header p-3 rounded-t-lg flex justify-between items-center">
            <span>
                <i class="fas fa-user me-1"></i> {{  $dream->full_name}} 
            </span>
            @if ($dream->status === 'fulfilled')
                <span class="badge bg-success text-white text-sm px-2 py-1 rounded">
                    <i class="fas fa-check-circle me-1"></i> تم التحقيق
                </span>
            @endif
        </div>

        @if (!empty($dream->image_path))
            <div class="dream-image" style="background-image: {{config('app.app_url') . '/storage/uploads/' . $dream->image_path}}"></div>
        @endif

        <div class="card-body p-4">
            <h5 class="card-title text-lg font-semibold text-blue-400">{{$dream->description}}</h5>
            <p class="card-text text-gray-300">{{$dream->description}}</p>
        </div>

        <div class="card-footer p-3">
            <div class="text-yellow-400 font-bold text-lg">
                <i class="fas fa-money-bill-wave me-1"></i> {{ $dream->amount }} ل.س
            </div>
        </div>
    </div>
</div>
