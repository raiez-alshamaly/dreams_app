<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <!-- إدراج Tailwind CSS -->
    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <!-- إدراج Bootstrap لدعم collapse -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- إدراج Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"> --}}
    <!-- إدراج Vite لملفات CSS وJS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-LaravelThemeCustomizer::theme-css />
    @if($theme)
        <style>
         
            body {
                font-family: 'Cairo', sans-serif;
                background-color: var(--dark-background);
                color: var(--text-light);
                line-height: 1.6;
            }

            .navbar {
                background: linear-gradient(135deg, var(--dark-background), var(--primary-color));
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                padding: 0.5rem 1rem;
                /* تقليل الحشوة */
            }

            .navbar-brand {
                font-size: 1.25rem;
                /* تصغير حجم الخط */
                font-weight: 700;
                color: var(--text-light);
            }

            .nav-link {
                font-size: 0.9rem;
                /* تصغير حجم الخط */
                font-weight: 500;
                padding: 0.25rem 0.75rem;
                /* تقليل الحشوة */
                color: var(--text-light);
                border-radius: 4px;
                transition: all 0.3s ease;
            }

            .nav-link:hover {
                background-color: rgba(255, 255, 255, 0.1);
                color: var(--accent-color);
            }

            .btn-send-dream {
                font-size: 0.85rem;
                /* تصغير حجم الخط */
                padding: 0.25rem 0.75rem;
                /* تقليل الحشوة */
                background-color: var(--light-secondary);
                border-color: var(--secondary-color);
                color: var(--text-dark);
                font-weight: 600;
                border-radius: 4px;
            }

            .btn-send-dream:hover {
                background-color: var(--secondary-color);
                color: var(--text-light);
            }

            /* زر الـ toggle للشاشات الصغيرة */
            .navbar-toggler {
                padding: 0.25rem 0.5rem;
                font-size: 0.875rem;
                border: none;
            }

            /* تنسيق القائمة المنسدلة في الشاشات الصغيرة */
            @media (max-width: 767.98px) {
                .navbar-collapse {
                    background-color: var(--dark-background);
                    padding: 0.5rem;
                    border-radius: 4px;
                }

                .nav-link {
                    padding: 0.5rem;
                    font-size: 0.875rem;
                }

                .btn-send-dream {
                    width: 100%;
                    text-align: center;
                    margin-top: 0.5rem;
                }
            }
            
        </style>
    @endif
</head>

<body>
    <nav class="navbar">
        <div class="container mx-auto flex items-center justify-between">
            <!-- اسم التطبيق -->
            <a class="navbar-brand flex items-center gap-2" href="/">
                <i class="fas fa-star-half-alt"></i>
                <span>{{ config('app.name') }}</span>
            </a>

            <!-- زر الـ toggle للشاشات الصغيرة -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-white"></i>
            </button>

            <!-- قائمة التنقل -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav flex flex-col md:flex-row gap-2 md:gap-4 mb-2 md:mb-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ Route('start') }}">
                            <i class="fas fa-home me-1"></i> الرئيسية
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ Route('dashboard') }}">
                                <i class="fas fa-tachometer-alt me-1"></i> لوحة التحكم
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ Route('logout') }}">
                                <i class="fas fa-sign-out-alt me-1"></i> تسجيل الخروج
                            </a>
                        </li>
                    @endauth
                </ul>
                <!-- زر إرسال الحلم -->
                <div class="flex md:ms-4">
                    <a href="/dream/create" class="btn-send-dream inline-flex items-center justify-center">
                        <i class="fas fa-plus-circle me-1"></i> أرسل حلمك
                    </a>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>