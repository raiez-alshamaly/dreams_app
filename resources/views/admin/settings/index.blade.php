@extends('layouts.admin')

@section('title', 'إعدادات الموقع')

@section('content')
<div class="container mx-auto">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold mb-6">إعدادات الشاشة الرئيسية</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="loader_type">
                    نوع المحتوى
                </label>
                <select name="loader_type" id="loader_type" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[var(--accent-color)]">
                    <option value="image" {{ $settings['loader_type'] === 'image' ? 'selected' : '' }}>صورة</option>
                    <option value="video" {{ $settings['loader_type'] === 'video' ? 'selected' : '' }}>فيديو</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="loader_text">
                    نص التحميل
                </label>
                <input type="text" name="loader_text" id="loader_text" value="{{ $settings['loader_text'] }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[var(--accent-color)]">
            </div>

            <div class="mb-6" id="image-section">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="loader_image">
                    صورة التحميل
                </label>
                @if($settings['loader_image'])
                    <div class="mb-2">
                        <img src="{{ $settings['loader_image'] }}" alt="Current loader image" class="max-w-xs rounded-lg shadow">
                    </div>
                @endif
                <input type="file" name="loader_image" id="loader_image" accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[var(--accent-color)]">
            </div>

            <div class="mb-6" id="video-section">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="loader_video">
                    فيديو التحميل
                </label>
                @if($settings['loader_video'])
                    <div class="mb-2">
                        <video width="320" height="240" controls class="rounded-lg shadow">
                            <source src="{{ $settings['loader_video'] }}" type="video/mp4">
                        </video>
                    </div>
                @endif
                <input type="file" name="loader_video" id="loader_video" accept="video/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[var(--accent-color)]">
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" 
                    class="px-4 py-2 bg-[var(--accent-color)] text-white rounded-md hover:bg-opacity-90 transition-colors">
                    <i class="fas fa-save ml-1"></i>
                    حفظ التغييرات
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loaderType = document.getElementById('loader_type');
        const imageSection = document.getElementById('image-section');
        const videoSection = document.getElementById('video-section');

        function toggleSections() {
            if (loaderType.value === 'image') {
                imageSection.style.display = 'block';
                videoSection.style.display = 'none';
            } else {
                imageSection.style.display = 'none';
                videoSection.style.display = 'block';
            }
        }

        loaderType.addEventListener('change', toggleSections);
        toggleSections();
    });
</script>
@endsection 