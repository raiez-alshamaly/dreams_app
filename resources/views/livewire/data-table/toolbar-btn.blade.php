@props(['wire' , 'lable' => '+'])
<div class="">
    <button {{ $wire }}
        class="bg-color-primary-500 text-[var(--color-light-100)] px-4 py-2 rounded hover:bg-color-primary-600">
        {{ $lable ?? $slot }}
    </button>
</div>
