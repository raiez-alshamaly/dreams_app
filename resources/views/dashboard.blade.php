@extends('layouts.admin')

@section('title', 'لوحة التحكم')

@section('content')
<div class="container mx-auto">
    {{-- عرض تنبيهات --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    {{-- نموذج تحديد مبلغ عشوائي --}}
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
        <h2 class="text-lg font-semibold mb-4">اختيار حلم عشوائي للتحقيق</h2>
        <form method="POST" action="{{ url('/admin/fulfill_dream') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="minAmount" class="block text-sm font-medium text-gray-700 mb-1">الحد الأدنى (ل.س)</label>
                    <input type="number" name="minAmount" id="minAmount" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[var(--accent-color)]"
                        value="{{ old('minAmount') }}">
                </div>
                <div>
                    <label for="maxAmount" class="block text-sm font-medium text-gray-700 mb-1">الحد الأقصى (ل.س)</label>
                    <input type="number" name="maxAmount" id="maxAmount" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[var(--accent-color)]"
                        value="{{ old('maxAmount') }}">
                </div>
            </div>
            <div class="flex gap-4 mt-4">
                <button type="submit" name="select_random" 
                    class="px-4 py-2 bg-[var(--accent-color)] text-white rounded-md hover:bg-opacity-90 transition-colors">
                    <i class="fas fa-random ml-1"></i>
                    اختيار عشوائي
                </button>
                <button type="submit" name="view_dreams" 
                    class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-opacity-90 transition-colors">
                    <i class="fas fa-eye ml-1"></i>
                    عرض المطابق
                </button>
            </div>
        </form>
    </div>

    {{-- عرض الأحلام --}}
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-semibold mb-4">إدارة جميع الأحلام</h2>
        <livewire:data-table.dream-table>
    </div>
</div>
@endsection
