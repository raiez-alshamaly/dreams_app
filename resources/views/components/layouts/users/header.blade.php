
    
    <nav class="not-blur bg-[linear-gradient(to_right,var(--color-primary-600),var(--color-secondary-400))] shadow-md py-1 px-10">
        <div class="not-blur  mx-auto flex items-center justify-between md:justify-normal">
            <!-- اسم التطبيق -->
            <a class="text-xl font-bold text-[var(--color-light-100)] flex items-center gap-2 shrink-0" href="/">
                <x-application-logo />
                <span>{{ config('app.name') }}</span>
            </a>

            <!-- قائمة التنقل للشاشات المتوسطة والكبيرة -->
            <div class="hidden md:flex items-center justify-between flex-grow mr-4">
                <ul class="flex items-center gap-4">
                    <li>
                        <a class="text-sm font-medium text-[var(--color-light-100)] px-3 py-2 rounded  hover:text-[var(--color-light-200)] transition-colors" 
                           aria-current="page" href="{{ Route('start') }}">
                            <i class="fas fa-home me-1"></i> الرئيسية
                        </a>
                    </li>
                    @auth
                        <li>
                            <a class="text-sm font-medium text-[var(--color-light-100)] px-3 py-2 rounded  hover:text-[var((--color-light-200)] transition-colors" 
                               href="{{ Route('admin.index') }}">
                                <i class="fas fa-tachometer-alt me-1"></i> لوحة التحكم
                            </a>
                        </li>
                        <li>
                            <form action="{{ Route('logout') }}" method="POST" >
                                @csrf
                                <button type="submit" class="text-sm font-medium text-[var(--color-light-100)] px-3 py-2 rounded  hover:text-[var((--color-light-200)] transition-colors">
                                    <i class="fas fa-sign-out-alt me-1"></i> تسجيل الخروج
                                </button>
    
                            </form>
                        </li>
                    @endauth
                </ul>
                <!-- زر إرسال الحلم -->
                <a href="{{ route('dreams.create') }}" 
                   class="text-sm font-semibold px-3 py-2 bg-[var(--color-secondary-50)] border border-[var(--color-secondary-100)] text-[var(--color-light-50)] rounded hover:bg-[var(--color-secondary-50)] hover:text-[var(--color-light-200)] transition-colors">
                    <i class="fas fa-plus-circle me-1"></i> أرسل حلمك
                </a>
            </div>

            <!-- زر الـ toggle للشاشات الصغيرة -->
            <button class="md:hidden p-2 text-sm border-0 text-[var(--color-light-50)] hover:bg-[var(--color-light-100)] rounded transition-colors" 
                type="button" 
                onclick="document.getElementById('mobileMenu').classList.toggle('hidden')"
                aria-controls="mobileMenu" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- قائمة التنقل للشاشات الصغيرة -->
        <div id="mobileMenu" class="hidden md:hidden mt-4 bg-[linear-gradient(to_right,var(--color-primary-600),var(--color-secondary-400))]  rounded-lg shadow-lg mx-2 p-4">
            <ul class="flex flex-col gap-2">
                <li>
                    <a class="block w-full text-sm font-medium text-[var(--color-light-200)] px-3 py-2 rounded  hover:text-[var((--color-light-200)] transition-colors" 
                       aria-current="page" href="{{ Route('start') }}">
                        <i class="fas fa-home me-1"></i> الرئيسية
                    </a>
                </li>
                @auth
                    <li>
                        <a class="block w-full text-sm font-medium text-[var(--color-light-200)] px-3 py-2 rounded  hover:text-[var((--color-light-200)] transition-colors" 
                           href="{{ Route('admin.index') }}">
                            <i class="fas fa-tachometer-alt me-1"></i> لوحة التحكم
                        </a>
                    </li>
                    <li>
                        <a class="block w-full text-sm font-medium text-[var(--color-light-200)] px-3 py-2 rounded hover:text-[var(--color-light-200)] transition-colors" 
                           href="{{ Route('logout') }}">
                            <i class="fas fa-sign-out-alt me-1"></i> تسجيل الخروج
                        </a>
                    </li>
                @endauth
                <li>
                    <x-widgets.buttons.primary style="full" >
                        <a href="{{ route('dreams.create') }}" >
                         <i class="fas fa-plus-circle me-1"></i> أرسل حلمك
                     </a>
                    </x-widgets.buttons.primary>
                   
                </li>
            </ul>
        </div>
    </nav>

    <script>
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobileMenu');
            const toggleButton = document.querySelector('[aria-controls="mobileMenu"]');
            
            if (!mobileMenu.contains(event.target) && !toggleButton.contains(event.target) && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>
