@extends('layouts.header')

@section('content')
    <h1 class="text-2xl font-bold mb-6">تعديل ألوان الثيم</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('theme-settings.update') }}" id="themeForm"
        class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-3xl">
        @csrf
        @method('PUT')

        @php
            $colors = [
                'primary-color' => 'اللون الأساسي',
                'secondary-color' => 'اللون الثانوي',
                'light-primary' => 'أساسي فاتح',
                'light-secondary' => 'ثانوي فاتح',
                'accent-color' => 'لون التمييز',
                'text-light' => 'لون النص الفاتح',
                'text-dark' => 'لون النص الغامق',
                'dark-background' => 'خلفية داكنة'
            ];
        @endphp

        @foreach($colors as $key => $label)
            <div>
                <label for="{{ $key }}" class="block font-medium mb-1">{{ $label }}</label>
                <input type="color" id="{{ $key }}" name="{{ $key }}" value="{{ $theme[$key] ?? '#000000' }}"
                    oninput="updatePreview('--{{ $key }}', this.value)" class="w-24 h-10 border rounded">
            </div>
        @endforeach

        <div class="col-span-2 mt-4">
            <button type="submit" class="bg-accent-color text-white px-6 py-2 rounded font-semibold hover:opacity-90">
                حفظ وتطبيق الثيم
            </button>
        </div>
    </form>

    <div class="mt-10 p-6 border rounded" id="preview"
        style="background-color: var(--dark-background); color: var(--text-light);">
        <h2 class="text-xl font-bold mb-2">معاينة مباشرة</h2>
        <p class="mb-2">هذا نص تجريبي بلون النص والخلفية</p>
        <button style="background-color: var(--accent-color); color: var(--text-dark);" class="px-4 py-2 rounded">
            زر بلون التمييز
        </button>
    </div>

    <script>
        function updatePreview(varName, value) {
            document.documentElement.style.setProperty(varName, value);
        }

        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[type="color"]').forEach(input => {
                updatePreview('--' + input.name, input.value);
            });
        });
    </script>
@endsection