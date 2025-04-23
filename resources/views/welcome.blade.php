<x-layouts.users.app>


<div class="container dreams-card-container mx-auto px-4 py-8">
    <!-- Dreams Grid Section -->
    <div class="bg-white/5 backdrop-blur-sm rounded-xl shadow-xl p-6 mb-8">
        <h2 class="text-3xl font-bold text-center mb-6 text-white">جميع الأحلام</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
            @forelse ($dreams as $dream)
                <x-dream-card :dream="$dream" />
            @empty
                <div class="col-span-full">
                    <div class="alert alert-info bg-blue-500/20 border border-blue-500 text-blue-200 text-center p-6 rounded-lg backdrop-blur-sm">
                        <i class="fas fa-info-circle text-2xl mb-2"></i>
                        <p class="text-lg">لم يتم إضافة أي أحلام بعد. كن أول من يشارك حلمه!</p>
                    </div>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination with Flex Styling -->
        @if($dreams->hasPages())
          
                <div class="mt-4 blureing flex flex-col  justify-between  backdrop-blur-sm rounded-lg p-2">
                    {{ $dreams->links() }}
                </div>
            
        @endif
    </div>

    <!-- Call to Action Section -->
    <div class=" blureing bg-gradient-to-r from-blue-900/90 to-green-900/90 backdrop-blur-sm text-white p-8 rounded-xl shadow-xl text-center transform hover:scale-[1.02] transition-transform duration-300">
        <h1 class="text-3xl font-bold mb-4">
            <i class="fas fa-star-half-alt me-2"></i>
            DreamsUP - حقق أحلامك
        </h1>
        <p class="text-gray-200 mb-6 text-lg">منصة لمشاركة وتحقيق الأحلام، يمكنك مشاركة حلمك وقد يتم اختياره للتحقيق!</p>
        <a href="{{ route('dreams.create') }}" 
            class="inline-block bg-white text-blue-900 font-semibold px-6 py-3 rounded-lg hover:bg-gray-200 transition-all duration-300 transform hover:scale-105 shadow-lg">
            <i class="fas fa-plus-circle me-2"></i> شارك حلمك الآن
        </a>
    </div>
</div>


<style>
    .blurred {
        filter: blur(4px) brightness(0.5);
        transition: filter 0.3s ease;
    }

    .dream-card:hover .label {
        opacity: 1;
        transform: translateY(0);
    }

</style>

<script>
    function applyBlur(activeCard) {
        // Select all body children except those with dreams-card-container or not-blur class
        document.querySelectorAll('body > *:not(.dreams-card-container):not(.not-blur)').forEach(el => el.classList.add('blurred'));
        document.querySelectorAll('.blureing').forEach(el => el.classList.add('blurred'));
        
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


</x-layouts.users.app>