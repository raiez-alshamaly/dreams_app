@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' =>  ' p-2  bg-light-100 border-[var(--color-light-300)] focus:border-[var(--color-primary-500)] focus:ring-[var(--color-primary-500)] rounded-md shadow-sm']) !!}>
