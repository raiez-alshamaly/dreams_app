
<div>
    <div class="flex flex-wrap mb-6">
        <figure class="w-full md:w-1/2">
            <img class="w-full object-cover rounded-xl" src="{{ asset('storage/' . $dream->image_path) }}"
                alt="{{ $dream->full_name }}">
        </figure>
        <div class="space-y-5 md:space-y-8 bg-color-neutral-600 shadow rounded-lg p-6">
            <h2 class="text-2xl font-bold md:text-3xl">{{ $dream->full_name }}</h2>
            <p class="text-lg text-color-light-200">{{ $dream->description }}</p>
            <p class="text-lg text-color-light-200">Amount: {{ $dream->amount }}</p>
            @if (isset($dream->budget))
                <p class="text-lg text-color-light-200">Budget: {{ $dream->budget }}</p>
            @endif
            @if (isset($dream->status))
                <p class="text-lg text-color-light-200">Status: {{ $dream->status }}</p>
            @endif
        </div>
       
    </div>
</div>
