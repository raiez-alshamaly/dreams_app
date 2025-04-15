
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} -
    </title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color:
                {{ \App\Models\ThemeSetting::where('key', 'background_color')->value('value') ?? '#ffffff' }}
            ;
            color:
                {{ \App\Models\ThemeSetting::where('key', 'text_color')->value('value') ?? '#000000' }}
            ;
        }
    
        .btn-custom {
            background-color:
                {{ \App\Models\ThemeSetting::where('key', 'btn_color')->value('value') ?? '#ff6600' }}
            ;
            color: #fff;
        }
    </style>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container containernav ">
            <a class="navbar-brand" href="/">
                <i class="fa fa-star-half-alt me-2"></i>
                <span class="fw-bold">{{ config('app.name') }}</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{   (Route::is('start')) ? 'active' : ''   }}" aria-current="page" href="{{Route('start')}}">الرئيسية</a>
                    </li>

                    @auth
                    <li class="nav-item">
                        <a class="nav-link  <?php    ec(is_url('/admin/dashboard') ? 'active' : '');  ?>" href="<?php    ec('/admin/dashboard'); ?>">لوحة التحكم</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php    ec(is_url('/admin/logout') ? 'active' : '');  ?> " href="<?php    ec('/admin/logout'); ?>">تسجيل الخروج</a>
                    </li>
                    @endauth

                     
                    
                </ul>
                <div class="d-flex">
                    <a href="/dream/create" class="btn btn-success ms-2">
                        <i class="fas fa-plus-circle me-1"></i> أرسل حلمك
                    </a>
                </div>
            </div>
        </div>
    </nav>