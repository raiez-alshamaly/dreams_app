@props(['value' => null , 'style' => 'solid' ])
@php 
   if($style == 'solid'){
    $class = '';
   }else if ($style== 'full'){
    $class = " bg-[var(--color-secondary)] ";
   }else{
    $class = '' ;
   }
@endphp

<button {{  $attributes->merge([ 'class' => "block  text-center text-sm font-semibold px-3 py-2 bg-[var(--light-secondary)] border border-[var(--secondary-color)] text-[var(--color-light-200)] rounded hover:bg-[var(--secondary-color)] hover:text-[var(--color-light-200)] transition-colors $class" ])  }}>
    {{$value ?? $slot}}
</button>