<x-layouts.admin>
    <x-slot:title> Admin Page </x-slot:title>

    <livewire:dreams.dream-info-card :dream="$dream" />

    <livewire:dreams.create-dream-step :id="$dream->id" />
    <!-- Additional Content -->
    <div class=" mt-6">
        <div class="flex flex-row justify-between">
            <h3 class="text-2xl font-semibold">خطوات تحقيق الحلم</h3>

        </div>
        <livewire:dreams.admin-dream-time-line :dream="$dream->id" />
    </div>



</x-layouts.admin>
