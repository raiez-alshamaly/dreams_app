

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} -
    </title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
   
    @if($theme)
    <style>
       
   
    :root {
        --primary-color:# {{ $theme['primary-color'] }};
        --secondary-color: #{{ $theme['secondary-color'] }};
        --light-primary:# {{ $theme['light-primary'] }};
        --light-secondary: #{{ $theme['light-secondary'] }};
        --accent-color: #{{ $theme['accent-color'] }};
        --text-light:# {{ $theme['text-light'] }};
        --text-dark: #{{ $theme['text-dark'] }};
        --dark-background: #{{ $theme['dark-background'] }};
    }




body {
    font-family: 'Cairo', sans-serif;
    background-color: var(--dark-background);
    color: var(--text-light);
    line-height: 1.6;
}

.main-container {
    min-height: calc(100vh - 200px);
}

/* Navigation Bar */
.navbar {
    background: linear-gradient(135deg, var(--dark-background));
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: 700;
}

.nav-link {
    font-weight: 500;
    padding: 0.5rem 1rem;
    margin: 0 0.25rem;
    border-radius: var(--border-radius);
    transition: all 0.3s ease;
}

.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.btn-success {
    background-color: var(--light-secondary);
    border-color: var(--secondary-color);
    font-weight: 600;
}

.btn-success:hover {
    background-color: var(--secondary-color);
}

/* Dream Cards */
.dream-card {
    background-color: rgba(255, 255, 255, 0.05);
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: var(--text-light);
}

.dream-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
}

.dream-card .card-header {
    background: linear-gradient(135deg, var(--light-primary), var(--primary-color));
    color: white;
    font-weight: 600;
    padding: 0.75rem 1rem;
    border-bottom: none;
}

.dream-card .card-body {
    padding: 1.25rem;
}

.dream-card .card-footer {
    background-color: rgba(0, 0, 0, 0.2);
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    padding: 0.75rem 1.25rem;
}

.dream-amount {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--accent-color);
}

.dream-image {
    height: 180px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

/* Dream Form - Fixed Colors */
.form-label {
    font-weight: 500;
    margin-bottom: 0.5rem;
    color: var(--text-light);
}

.form-control {
    border-radius: var(--border-radius);
    padding: 0.5rem 0.75rem;
    font-size: 1rem;
    background-color: #fff;
    border: 1px solid #ced4da;
    color: var(--text-dark);
}

.form-control:focus {
    border-color: var(--light-primary);
    box-shadow: 0 0 0 0.25rem rgba(26, 58, 108, 0.25);
    background-color: #fff;
    color: var(--text-dark);
}

.form-select {
    background-color: #fff;
    color: var(--text-dark);
    border-color: #ced4da;
}

.btn-primary {
    background-color: var(--light-primary);
    border-color: var(--primary-color);
    font-weight: 600;
}

.btn-primary:hover {
    background-color: var(--primary-color);
}

/* Mini Ticker for Fulfilled Dreams - New Version */
.ticker-wrap {
    position: fixed;
    bottom: 0;
    width: 100%;
    background: linear-gradient(135deg, #0c1523, #0f1b2e);
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.3);
    color: var(--text-light);
    height: 50px;
    z-index: 100;
    overflow: hidden;
}

.ticker-heading {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--accent-color);
    color: var(--text-dark);

    font-weight: 600;
    height: 100%;
    float: right;
    width: 120px;
}

.ticker-container {
    height: 100%;
    width: calc(100% - 120px);
    overflow: hidden;
    position: relative;
    float: right;
}

.ticker-track {
    display: flex;
    position: absolute;
    white-space: nowrap;
    will-change: transform;
    animation: ticker-slide 30s linear infinite;
    height: 100%;
    align-items: center;
}

.ticker-item {
    display: inline-flex;
    align-items: center;
    background-color: rgba(255, 255, 255, 0.08);
    border-radius: 4px;
    padding: 0.5rem 1rem;
    margin: 0 0.5rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    color: var(--text-light);
    height: 35px;
}

.ticker-name {
    font-weight: 600;
    color: #fff;
    margin-left: 0.5rem;
}

.ticker-amount {
    font-weight: 600;
    color: var(--accent-color);
}

@keyframes ticker-slide {
    0% {
        transform: translateX(calc(100% + 20px));
    }

    100% {
        transform: translateX(-100%);
    }
}

/* Footer */
.footer {
    background-color: var(--dark-background);
    color: var(--text-light);
    padding: 1.5rem 0;
    margin-top: 2rem;
    margin-bottom: 60px;
    /* Space for ticker */
}

.footer a {
    color: var(--text-light);
    transition: color 0.3s ease;
}

.footer a:hover {
    color: var(--accent-color);
}

/* Admin Panel */
.admin-card {
    border: none;
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    margin-bottom: 1.5rem;
    background-color: rgba(255, 255, 255, 0.05);
    color: var(--text-light);
}

.admin-card .card-header {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    font-weight: 600;
    border-radius: calc(var(--border-radius) - 1px) calc(var(--border-radius) - 1px) 0 0;
}

.admin-table {
    width: 100%;
    margin-bottom: 1rem;
    color: var(--text-light);
}

.admin-table th {
    background-color: rgba(0, 0, 0, 0.2);
    font-weight: 600;
}

.admin-table td {
    border-color: rgba(255, 255, 255, 0.1);
}

.btn-admin {
    margin-right: 0.25rem;
}

.btn-fulfill {
    background-color: var(--light-secondary);
    border-color: var(--secondary-color);
    color: white;
}

.btn-fulfill:hover {
    background-color: var(--secondary-color);
    color: white;
}

/* Pagination */
.pagination .page-link {
    color: var(--text-light);
    border-radius: 4px;
    margin: 0 0.1rem;
    background-color: rgba(255, 255, 255, 0.05);
    border-color: rgba(255, 255, 255, 0.1);
}

.pagination .page-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.pagination .page-item.active .page-link {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

.pagination .page-item.disabled .page-link {
    color: rgba(255, 255, 255, 0.3);
    background-color: rgba(255, 255, 255, 0.02);
}

/* Responsive adjustments */
@media (max-width: 767.98px) {
    .dream-card {
        margin-bottom: 1rem;
    }

    .ticker-heading {
        padding: 0.25rem 0.5rem;
        font-size: 0.9rem;
    }

    .ticker {
        width: calc(100% - 120px);
    }

    .ticker-item {
        padding: 0.4rem 0.7rem;
        margin: 0 0.5rem;
    }

    .hero-section h1 {
        font-size: 1.5rem;
    }

    .hero-section p {
        font-size: 0.9rem;
    }

    .btn-lg {
        padding: 0.4rem 0.8rem;
        font-size: 0.95rem;
    }
}

/* Hero Section - Smaller Size */
.hero-section {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 1.5rem 0;
    /* Reduced from 3rem */
    margin-bottom: 1.5rem;
    /* Reduced from 2rem */
    border-radius: var(--border-radius);
    text-align: center;
}

.hero-section h1 {
    font-size: 1.8rem;
    /* Reduced from 2.5rem */
    font-weight: 700;
    margin-bottom: 0.7rem;
    /* Reduced from 1rem */
}

.hero-section p {
    font-size: 1rem;
    /* Reduced from 1.25rem */
    margin-bottom: 1rem;
    /* Reduced from 1.5rem */
    opacity: 0.9;
}

/* Alert Messages */
.alert {
    border-radius: var(--border-radius);
    margin-bottom: 1.5rem;
    background-color: rgba(255, 255, 255, 0.05);
}

.alert-success {
    background-color: rgba(42, 107, 95, 0.2);
    border-color: var(--secondary-color);
    color: #2cffda;
}

.alert-danger {
    background-color: rgba(220, 53, 69, 0.2);
    border-color: #dc3545;
    color: #ff6b7a;
}

.alert-info {
    background-color: rgba(44, 168, 255, 0.2);
    border-color: #2ca8ff;
    color: #8dd3ff;
}

/* Login Form */
.login-form {
    max-width: 400px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: rgba(255, 255, 255, 0.05);
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
}

.login-form .form-group {
    margin-bottom: 1.5rem;
}

.login-form .btn {
    width: 100%;
}

/* Buttons */
.btn {
    border-radius: var(--border-radius);
    padding: 0.5rem 1.25rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

/* Style for fulfilled dreams */
.fulfilled-dream {
    border: 2px solid var(--light-secondary) !important;
    background-color: rgba(42, 107, 95, 0.1);
}

.fulfilled-dream .card-header {
    background: linear-gradient(135deg, var(--light-secondary), var(--secondary-color));
}

/* Container backgrounds for dark theme */
.container {
    background-color: var(--dark-background);
    padding: 1.5rem;
    border-radius: var(--border-radius);
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
}

/* Submit Dream Form Improvements */
.dream-form {
    background-color: rgba(255, 255, 255, 0.03);
    padding: 1.5rem;
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
}

.dream-form .card-header {
    background: linear-gradient(135deg, var(--light-primary), var(--primary-color));
    color: white;
    text-align: center;
    font-weight: 600;
    border-radius: var(--border-radius) var(--border-radius) 0 0;
    padding: 0.75rem 1rem;
    margin: -1.5rem -1.5rem 1.5rem;
}

.image-preview-container {
    text-align: center;
    margin-bottom: 1rem;
}

#imagePreview {
    max-width: 100%;
    max-height: 200px;
    border-radius: var(--border-radius);
    display: none;
    margin: 0 auto;
}

.form-text {
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.875rem;
}

.invalid-feedback {
    color: #ff6b7a;
}

.containernav {
    background-color: rgba(255, 255, 255, 0.03);
    padding: 0.5rem;
    border-radius: var(--border-radius);
    margin-top: 1rem;
    margin-bottom: 1rem;
}
    
</style>
@endif
    


</head>

<body>
    <nav class="">
        <div class="container mx-auto">
            <a class="" href="/">
                <i class=""></i>
                <span class="">{{ config('app.name') }}</span>
            </a>

            <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>

            <div class="" id="navbarMain">
                <ul class="mb-2">
                    <li class="">
                        <a class="" aria-current="page" href="{{Route('start')}}">الرئيسية</a>
                    </li>

                    @auth
                                <li class="">
                <a class="" href="{{ Route('dashboard') }}">لوحة التحكم</a>
                                </li>
                                <li class="">
                <a class="" href="{{ Route('logout') }}">تسجيل الخروج</a>
                                </li>
                    @endauth

                     
                    
                </ul>
                <div class="flex">
                    <a href="/dream/create" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm bg-green-500 hover:bg-green-700 text-white">
                        <i class=""></i> أرسل حلمك
                    </a>
                </div>
            </div>
        </div>
    </nav>