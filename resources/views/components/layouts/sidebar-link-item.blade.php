@props(['route'  , 'label' ])

<li>
    @php 
    if(Route::current()->getName() == $route)
        $isActive = true ;
    else
        $isActive = false;
    @endphp
    <a class="flex items-center gap-x-3.5 py-2 px-2.5  text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 {{ $isActive ? 'bg-gray-100 dark:bg-neutral-700' : ' ' }} dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 dark:text-white" href="{{ route($route) }}">
      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
        <polyline points="9 22 9 12 15 12 15 22" />
      </svg>
      {{ $label }}
    </a>
</li>

