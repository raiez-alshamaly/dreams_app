@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium  text-[var(--color-light-900)] text-lg ']) }}>
    {{ $value ?? $slot }}
</label>
