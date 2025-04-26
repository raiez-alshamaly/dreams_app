
<div class ="text-[var(--color-light-100)]  bg-color-dark-200 rounded-xl  pb-4 ">
    <figure class="w-full flex flex-row gap-4   bg-[var(--color-dark-200)] p-6">
        <img class=" object-cover w-80  " src="{{ asset('storage/' . $dream->image_path) }}"
            alt="{{ $dream->full_name }}">
            
            <div class=" flex flex-col  m-4  justify-around gap-6 border-s-2 border-[var(--color-neutral-400)]  p-6">
                <h2 class="text-2xl font-bold md:text-3xl">{{ $dream->full_name }}</h2>
                <p class="text-lg text-[var(--color-light-100)]">{{ $dream->description }}</p>
                <p class="text-lg text-[var(--color-light-100)]">Amount: {{ $dream->amount }}</p>
                @if (isset($dream->budget))
                    <p class="text-lg text-[var(--color-light-100)]">Budget: {{ $dream->budget }}</p>
                @endif
                @if (isset($dream->status))
                    <p class="text-lg text-[var(--color-light-100)]">Status: {{ $dream->status }}</p>
                @endif
            </div>
    </figure>
    <figure class="w-full mt-3 flex flex-row gap-4  bg-[var(--color-dark-200)] p-6 ">
        <img class=" object-cover w-80 " src="{{ asset('storage/' . $dream->id_image_path) }}"
            alt="{{ $dream->full_name }}">
            
            <div class=" flex flex-col  m-4  justify-around gap-6 border-s-2 border-[var(--color-neutral-400)]  p-6">
                <h2 class="text-2xl font-bold md:text-3xl">{{ $dream->full_name }}</h2>
              
                <p class="text-lg text-[var(--color-light-100)]">phone: {{ $dream->phone }}</p>
              
            </div>

    </figure>
    {{-- action buttons --}}
    <div class="w-full mt-4 flex flex-row gap-4 mb-4 p-6 " >
        <x-widgets.buttons.primary wire:click='accept' >accept</x-widgets.buttons.primary>
        <x-widgets.buttons.primary wire:click='restore' >restor</x-widgets.buttons.primary>

    </div>
</div>
