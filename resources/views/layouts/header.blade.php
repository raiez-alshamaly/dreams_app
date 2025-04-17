<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-LaravelThemeCustomizer::theme-css />
</head>

<body class="font-['Cairo'] bg-[var(--dark-background)] text-[var(--text-light)] leading-relaxed">
    <nav class="not-blur bg-gradient-to-r from-[var(--dark-background)] to-[var(--primary-color)] shadow-md py-1 px-10">
        <div class="not-blur  mx-auto flex items-center justify-between md:justify-normal">
            <!-- اسم التطبيق -->
            <a class="text-xl font-bold text-[var(--text-light)] flex items-center gap-2 shrink-0" href="/">
                <i class="fas fa-star-half-alt"></i>
                <span>{{ config('app.name') }}</span>
            </a>

            <!-- قائمة التنقل للشاشات المتوسطة والكبيرة -->
            <div class="hidden md:flex items-center justify-between flex-grow mr-4">
                <ul class="flex items-center gap-4">
                    <li>
                        <a class="text-sm font-medium text-[var(--text-light)] px-3 py-2 rounded hover:bg-white/10 hover:text-[var(--accent-color)] transition-colors" 
                           aria-current="page" href="{{ Route('start') }}">
                            <i class="fas fa-home me-1"></i> الرئيسية
                        </a>
                    </li>
                    @auth
                        <li>
                            <a class="text-sm font-medium text-[var(--text-light)] px-3 py-2 rounded hover:bg-white/10 hover:text-[var(--accent-color)] transition-colors" 
                               href="{{ Route('dashboard') }}">
                                <i class="fas fa-tachometer-alt me-1"></i> لوحة التحكم
                            </a>
                        </li>
                        <li>
                            <form action="{{ Route('logout') }}" method="POST" >
                                @csrf
                                <button type="submit" class="text-sm font-medium text-[var(--text-light)] px-3 py-2 rounded hover:bg-white/10 hover:text-[var(--accent-color)] transition-colors">
                                    <i class="fas fa-sign-out-alt me-1"></i> تسجيل الخروج
                                </button>
    
                            </form>
                        </li>
                    @endauth
                </ul>
                <!-- زر إرسال الحلم -->
                <a href="/dream/create" 
                   class="text-sm font-semibold px-3 py-2 bg-[var(--light-secondary)] border border-[var(--secondary-color)] text-[var(--text-dark)] rounded hover:bg-[var(--secondary-color)] hover:text-[var(--text-light)] transition-colors">
                    <i class="fas fa-plus-circle me-1"></i> أرسل حلمك
                </a>
            </div>

            <!-- زر الـ toggle للشاشات الصغيرة -->
            <button class="md:hidden p-2 text-sm border-0 text-white hover:bg-white/10 rounded transition-colors" 
                type="button" 
                onclick="document.getElementById('mobileMenu').classList.toggle('hidden')"
                aria-controls="mobileMenu" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- قائمة التنقل للشاشات الصغيرة -->
        <div id="mobileMenu" class="hidden md:hidden mt-4 bg-[#2D3748] rounded-lg shadow-lg mx-2 p-4">
            <ul class="flex flex-col gap-2">
                <li>
                    <a class="block w-full text-sm font-medium text-[var(--text-light)] px-3 py-2 rounded hover:bg-white/10 hover:text-[var(--accent-color)] transition-colors" 
                       aria-current="page" href="{{ Route('start') }}">
                        <i class="fas fa-home me-1"></i> الرئيسية
                    </a>
                </li>
                @auth
                    <li>
                        <a class="block w-full text-sm font-medium text-[var(--text-light)] px-3 py-2 rounded hover:bg-white/10 hover:text-[var(--accent-color)] transition-colors" 
                           href="{{ Route('dashboard') }}">
                            <i class="fas fa-tachometer-alt me-1"></i> لوحة التحكم
                        </a>
                    </li>
                    <li>
                        <a class="block w-full text-sm font-medium text-[var(--text-light)] px-3 py-2 rounded hover:bg-white/10 hover:text-[var(--accent-color)] transition-colors" 
                           href="{{ Route('logout') }}">
                            <i class="fas fa-sign-out-alt me-1"></i> تسجيل الخروج
                        </a>
                    </li>
                @endauth
                <li>
                    <a href="/dream/create" 
                       class="block w-full text-center text-sm font-semibold px-3 py-2 bg-[var(--light-secondary)] border border-[var(--secondary-color)] text-[var(--text-dark)] rounded hover:bg-[var(--secondary-color)] hover:text-[var(--text-light)] transition-colors">
                        <i class="fas fa-plus-circle me-1"></i> أرسل حلمك
                    </a>
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
</body>

</html>