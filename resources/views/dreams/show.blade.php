<x-layouts.users.app  has-footer="{{ false }}">
     <div class="max-w-3xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">
        <div class="max-w-2xl">
            <!-- Images Section -->

            <figure class="w-full ">
                <img class="w-full h-64 object-cover rounded-xl" src="{{ asset('storage/' . $dream->image_path) }}"
                    alt="{{ $dream->full_name }}">
            </figure>



            <!-- Dream Details -->
            <div class="mt-3 space-y-5 md:space-y-8 bg-gradient-to-r bg-[linear-gradient(to_right,var(--color-primary-600),var(--color-secondary-400))] shadow rounded-lg p-6">
                <h2 class="text-2xl  text-color-light-50 font-bold md:text-3xl">{{ $dream->full_name }}</h2>
                <p class="text-lg text-color-light-50">{{ $dream->description }}</p>
                <p class="text-lg text-color-light-50">المبلغ: {{ $dream->amount }}</p>
               
                @if (isset($dream->status))
                    <p class="text-lg text-color-light-50">الحالة: {{ $dream->status }}</p>
                @endif
            </div>
            <!-- Additional Content -->
            <div class="space-y-3 mt-6 bg-gradient-to-r bg-[linear-gradient(to_right,var(--color-primary-600),var(--color-secondary-400))] rounded-md p-4">
                <div class="flex flex-row justify-between">
                    <h3 class="text-2xl font-semibold text-color-light-50">خطوات تحقيق الحلم</h3>

                </div>
                <livewire:dreams.dream-time-line :dream="$dream->id">
            </div>
        </div>
    </div>

</x-layouts.users.app>
   
