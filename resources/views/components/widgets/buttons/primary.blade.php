@props(['value' => null , 'style' => 'solid' ])
@php 
   if($style == 'solid'){
    $class = 'border border-[var(--color-primary)]';
   }else if ($style== 'full'){
    $class = " bg-[var(--color-primary-500)]  hover:bg-[var(--color-primary-400)] ";
   }else{
    $class = '' ;
   }
@endphp

<button {{  $attributes->merge([ 'class' => "block  text-center text-sm font-semibold px-3 py-2   text-[var(--color-light-50)] rounded hover:text-[var(--color-light-100)] transition-colors $class" ])  }}>
    {{$value ?? $slot}}
</button>