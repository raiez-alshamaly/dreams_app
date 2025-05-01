@props(['route'  , 'label' ])

<li>
    @php 
    if(Route::current()->getName() == $route)
        $isActive = true ;
    else
        $isActive = false;
    @endphp
    <a class="flex items-center gap-x-3.5 py-2 px-2.5  text-sm text-[var(--color-light-100)] rounded-lg  focus:outline-hidden focus:bg-[var(--color-neutral-700)] {{ $isActive ? ' bg-[var(--color-neutral-600)]' : ' ' }} hover:bg-[var(--color-neutral-600)] " href="{{ route($route) }}">
      
      {{ $label }}
    </a>
</li>

