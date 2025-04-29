<div class="preview-frame mt-5 border border-gray-300 rounded-lg overflow-hidden" 
     x-data="{ colors: @entangle('colors'), colorShadows: @entangle('colorShadows') }" 
     x-init="
         // Set base colors
         document.documentElement.style.setProperty('--preview-primary', colors.primary);
         document.documentElement.style.setProperty('--preview-secondary', colors.secondary);
         document.documentElement.style.setProperty('--preview-accent', colors.accent);
         document.documentElement.style.setProperty('--preview-warning', colors.warning);
         document.documentElement.style.setProperty('--preview-success', colors.success);
         document.documentElement.style.setProperty('--preview-highlight', colors.highlight);
         document.documentElement.style.setProperty('--preview-dark', colors.dark);
         document.documentElement.style.setProperty('--preview-neutral', colors.neutral);
         document.documentElement.style.setProperty('--preview-light', colors.light);

         // Set shadow variants for each color
         @foreach($colorShadows as $colorName => $shades)
             @foreach($shades as $percent => $shade)
                 document.documentElement.style.setProperty('--preview-color-{{ $colorName }}-{{ ($percent*10) }}', '{{ $shade }}');
             @endforeach
         @endforeach

         // Watch for updates
         $watch('colors', value => {
             document.documentElement.style.setProperty('--preview-primary', value.primary);
             document.documentElement.style.setProperty('--preview-secondary', value.secondary);
             document.documentElement.style.setProperty('--preview-accent', value.accent);
             document.documentElement.style.setProperty('--preview-warning', value.warning);
             document.documentElement.style.setProperty('--preview-success', value.success);
             document.documentElement.style.setProperty('--preview-highlight', value.highlight);
             document.documentElement.style.setProperty('--preview-dark', value.dark);
             document.documentElement.style.setProperty('--preview-neutral', value.neutral);
             document.documentElement.style.setProperty('--preview-light', value.light);
         });

         $watch('colorShadows', value => {
             @foreach($colorShadows as $colorName => $shades)
                 @foreach($shades as $percent => $shade)
                     document.documentElement.style.setProperty('--preview-color-{{ $colorName }}-{{ ( $percent*10) }}', value['{{ $colorName }}']['{{ $percent }}']);
                 @endforeach
             @endforeach
         });

         // Listen for color-changed event
         window.addEventListener('color-changed', event => {
             colors = event.detail.colors;
             colorShadows = event.detail.colorShadows;
         });
     ">
    <main class="font-['Cairo'] bg-[var(--preview-color-neutral-800)]  leading-relaxed"  >
        <nav class="not-blur bg-[linear-gradient(to_right,var(--preview-color-primary-600),var(--preview-color-secondary-400))] shadow-md py-1 px-10">
            <div class="not-blur  mx-auto flex items-center justify-between md:justify-normal">
                <!-- اسم التطبيق -->
                <a class="text-xl font-bold text-[var(--preview-light)] flex items-center gap-2 shrink-0" href="/">
                    <i class="fas fa-star-half-alt"></i>
                    <span>{{ config('app.name') }}</span>
                </a>
    
                <!-- قائمة التنقل للشاشات المتوسطة والكبيرة -->
                <div class="hidden md:flex items-center justify-between flex-grow mr-4">
                    <ul class="flex items-center gap-4">
                        <li>
                            <a class="text-sm font-medium text-[var(--preview-color-light-100)] px-3 py-2 rounded hover:bg-white/10 hover:text-[var(--preview-color-light-50)] transition-colors" 
                               aria-current="page" href="">
                                <i class="fas fa-home me-1"></i> الرئيسية
                            </a>
                        </li>
                      
                    </ul>
                    <!-- زر إرسال الحلم -->
                    <a href="" 
                       class="text-sm font-semibold px-3 py-2 bg-[var(--preview-color-secondary-600)] border border-[var(--preview-color-secondary-600)] text-[var(--preview-color-light-100)] rounded hover:bg-[var(--preview-color-secondary-500)] hover:text-[var(--preview-color-light-50)] transition-colors">
                        <i class="fas fa-plus-circle me-1"></i> أرسل حلمك
                    </a>
                </div>
    
                <!-- زر الـ toggle للشاشات الصغيرة -->
                <button class="md:hidden p-2 text-sm border-0 text-white hover:bg-white/10 rounded transition-colors" 
                    type="button" 
                    onclick="document.getElementById('preview-mobileMenu').classList.toggle('hidden')"
                    aria-controls="preview-mobileMenu" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
    
            <!-- قائمة التنقل للشاشات الصغيرة -->
            <div id="preview-mobileMenu" class="hidden md:hidden mt-4 bg-[var(--preview-dark)] rounded-lg shadow-lg mx-2 p-4">
                <ul class="flex flex-col gap-2">
                    <li>
                        <a class="block w-full text-sm font-medium text-[var(--preview-light)] px-3 py-2 rounded hover:bg-white/10 hover:text-[var(--preview-light)] transition-colors" 
                           aria-current="page" href="...">
                            <i class="fas fa-home me-1"></i> الرئيسية
                        </a>
                    </li>
                  
                    <li>
                        <a href="..." 
                           class="block w-full text-center text-sm font-semibold px-3 py-2 bg-[var(--preview-secondary)] border border-[var(--preview-secondary)] text-[var(--preview-dark)] rounded hover:bg-[var(--preview-secondary)] hover:text-[var(--preview-light)] transition-colors">
                            <i class="fas fa-plus-circle me-1"></i> أرسل حلمك
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <script>
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                const mobileMenu = document.getElementById('preview-mobileMenu');
                const toggleButton = document.querySelector('[aria-controls="preview-mobileMenu"]');
                
                if (!mobileMenu.contains(event.target) && !toggleButton.contains(event.target) && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            });
        </script>

        <div class="container dreams-card-container mx-auto px-4 py-8">
                 <!-- Dreams Grid Section -->
                <div class="bg-white/5 backdrop-blur-sm rounded-xl shadow-xl p-6 mb-8">
                    <h2 class="text-3xl font-bold text-center mb-6 text-white">جميع الأحلام</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
                    
                            {{-- <x-dream-card :dream="$dream" /> --}}
                    
                            <div class="col-span-full">
                                <div class="alert alert-info bg-blue-500/20 border border-blue-500 text-blue-200 text-center p-6 rounded-lg backdrop-blur-sm">
                                    <i class="fas fa-info-circle text-2xl mb-2"></i>
                                    <p class="text-lg">لم يتم إضافة أي أحلام بعد. كن أول من يشارك حلمه!</p>
                                </div>
                            </div>
                    
                    </div>
                    
                    <!-- Pagination with Flex Styling -->
                
                </div>

                <!-- Call to Action Section -->
                <div class=" blureing bg-gradient-to-r from-blue-900/90 to-green-900/90 backdrop-blur-sm text-white p-8 rounded-xl shadow-xl text-center transform hover:scale-[1.02] transition-transform duration-300">
                    <h1 class="text-3xl font-bold mb-4">
                        <i class="fas fa-star-half-alt me-2"></i>
                        DreamsUP - حقق أحلامك
                    </h1>
                    <p class="text-gray-200 mb-6 text-lg">منصة لمشاركة وتحقيق الأحلام، يمكنك مشاركة حلمك وقد يتم اختياره للتحقيق!</p>
                    <a href="{{ url('dream/create') }}"
                        class="inline-block bg-white text-blue-900 font-semibold px-6 py-3 rounded-lg hover:bg-gray-200 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-plus-circle me-2"></i> شارك حلمك الآن
                    </a>
                </div>
        </div>
        <!-- التذييل -->
        <footer class=" py-2 bg-color-dark-100 text-color-light-200 mt-4">
            <div class="container mx-auto text-center">
                <span class="text-sm">
                    جميع الحقوق محفوظة © {{ config('app.name') . ' ' . date('Y') }}
                </span>
            </div>
        </footer>
        <div id=""
            class=" w-full bg-gradient-to-r from-[var(--preview-dark)]/30 to-[var(--preview-dark)]/60 shadow-[0_-2px_5px_rgba(0,0,0,0.3)] text-[var(--preview-light)] h-10 z-[100] overflow-hidden">
            <div
                class=" flex items-center justify-center bg-[var(--preview-accent)] text-[var(--preview-light)] font-semibold h-full w-[100px] float-right text-sm">
                <i class="fas fa-check-circle me-1"></i> أحلام تحققت
            </div>
            <div class=" h-full w-[calc(100%-100px)] overflow-hidden  float-right">
                <div class=" flex whitespace-nowrap h-full items-center">
                
                        <div
                            class=" inline-flex items-center bg-color-dark-200 rounded px-2 py-1 mx-2 shadow-[0_2px_4px_rgba(0,0,0,0.2)] text-[var(--preview-light)] h-7 text-sm">
                            <span class="ticker-name font-semibold text-white me-2">Dream name</span>
                            <span class="ticker-amount font-semibold text-[var(--preview-accent)]">10 ل.س</span>
                        </div>
                       
                 
                
                        <div
                            class=" inline-flex items-center bg-[var(--preview-dark)] rounded px-2 py-1 mx-2 shadow-[0_2px_4px_rgba(0,0,0,0.2)] text-[var(--preview-light)] h-7 text-sm">
                            <span class="ticker-name font-semibold text-white">كن أول من يحقق حلمه!</span>
                        </div>
                
                </div>
            
            </div>
        </div>


    </main>
</div>