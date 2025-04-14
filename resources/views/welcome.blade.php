@include('layouts.header');


    <div class="container mx-auto px-4 py-6 bg-white/5 rounded-lg mt-6 mb-6">
        <h2 class="text-2xl font-bold text-center mb-4">جميع الأحلام</h2>

        @forelse ($dreams as $dream)
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($dreams as $dream)
                    <div class="col">
                        <div class="card dream-card h-100 bg-white/5 rounded-lg shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 {{ $dream->status === 'fulfilled' ? 'fulfilled-dream' : '' }}">
                            <div class="card-header p-3 rounded-t-lg flex justify-between items-center">
                                <span>
                                    <i class="fas fa-user me-1"></i> {{  $dream->full_name}} ?>
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
                @endforeach
            </div>
        @empty
            <div class="alert alert-info bg-blue-500/20 border border-blue-500 text-blue-200 text-center p-4 rounded-lg">
                لم يتم إضافة أي أحلام بعد. كن أول من يشارك حلمه!
            </div>
        @endforelse

        <div class="mt-8 bg-gradient-to-r from-blue-900 to-green-900 text-white p-6 rounded-lg text-center">
            <h1 class="text-2xl font-bold mb-2">
                <i class="fas fa-star-half-alt me-2"></i>
                DreamsUP - حقق أحلامك
            </h1>
            <p class="text-gray-200 mb-4">منصة لمشاركة وتحقيق الأحلام، يمكنك مشاركة حلمك وقد يتم اختياره للتحقيق!</p>
            <a href="{{ url('dream/create') }}" class="inline-block bg-white text-blue-900 font-semibold px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors">
                <i class="fas fa-plus-circle me-1"></i> شارك حلمك الآن
            </a>
        </div>
    </div>




@include('layouts.footer')