@props(['label', 'id', 'type' => 'text' , 'divstyle' => ''])
<div class=" mb-4 {{$divstyle}} ">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-color-light-50 ">
        {{ $label }}
    </label>

    @if ($errors->has($id))
        <div class="relative">
            <input type="{{$type}}" id="{{ $id }}" name="{{ $id }}"
                aria-describedby="{{ $id }}-helper"
                {{ $attributes->merge(['class' => 'border border-gray-300 text-color-light-200 sm:text-sm rounded-lg bg-cyan-50 focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  border-red-400 focus:border-red-600 focus:ring-red-600']) }}>
            @error($id)
                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                    <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" x2="12" y1="8" y2="12"></line>
                        <line x1="12" x2="12.01" y1="16" y2="16"></line>
                    </svg>
                </div>
            </div>
            <p class="text-sm text-red-600 mt-2" id="{{ $id }}-helper">{{ $message }}</p>
        @enderror
    @else
        <div class="relative">
            <input type="{{$type}}" id="{{ $id }}" name="{{ $id }}"
                aria-describedby="{{ $id }}-helper"
                {{ $attributes->merge(['class' => 'border  text-light-900 sm:text-sm rounded-lg bg-cyan-50 focus:ring-[var(--color-primary-600)] focus:border-[var(--color-primary-600)] block w-full p-2.5  bg-red ']) }}>
        </div>
    @endif

</div>



