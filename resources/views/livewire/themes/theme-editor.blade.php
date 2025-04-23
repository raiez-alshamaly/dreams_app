<div class="theme-customizer p-5 bg-white rounded-lg shadow">
    <div class="color-picker-group grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-5 mb-5">
        <div class="color-picker flex flex-col gap-2">
            <label for="primary" class="font-medium text-gray-700">Primary Color</label>
            <input type="color" id="primary" wire:model.live="colors.primary" class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="secondary" class="font-medium text-gray-700">Secondary Color</label>
            <input type="color" id="secondary" wire:model.live="colors.secondary" class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="accent" class="font-medium text-gray-700">Accent Color</label>
            <input type="color" id="accent" wire:model.live="colors.accent" class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="warning" class="font-medium text-gray-700">Warning Color</label>
            <input type="color" id="warning" wire:model.live="colors.warning" class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="success" class="font-medium text-gray-700">Success Color</label>
            <input type="color" id="success" wire:model.live="colors.success" class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="highlight" class="font-medium text-gray-700">Highlight Color</label>
            <input type="color" id="highlight" wire:model.live="colors.highlight" class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="dark" class="font-medium text-gray-700">Dark Color</label>
            <input type="color" id="dark" wire:model.live="colors.dark" class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="neutral" class="font-medium text-gray-700">Neutral Color</label>
            <input type="color" id="neutral" wire:model.live="colors.neutral" class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="light" class="font-medium text-gray-700">Light Color</label>
            <input type="color" id="light" wire:model.live="colors.light" class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
    </div>
    <form wire:submit.prevent="save" class="mt-5" method="POST">
        @csrf
        <input type="hidden" name="colors" wire:model="colors">
        <button type="submit" class="px-5 py-2.5 border-none rounded font-medium bg-color-primary-200 text-white cursor-pointer">Save Colors</button>
    </form>
   
    <livewire:themes.theme-editor-preview  :colors="$colors"  :color-shadows="$colorShadows" />

    
</div>