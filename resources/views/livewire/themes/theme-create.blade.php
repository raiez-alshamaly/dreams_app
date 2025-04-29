<div class="theme-customizer p-5 bg-[var(--color-neutral-700)] rounded-lg shadow">
    <div class="  color-picker-group grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
        <div class="color-picker flex flex-col gap-2">
            <label for="primary" class="font-medium text-[var(--color-light-100)]">Primary Color</label>
            <input type="color" id="primary" wire:model.live="colors.primary"
                class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="secondary" class="font-medium text-[var(--color-light-100)]">Secondary Color</label>
            <input type="color" id="secondary" wire:model.live="colors.secondary"
                class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="accent" class="font-medium text-[var(--color-light-100)]">Accent Color</label>
            <input type="color" id="accent" wire:model.live="colors.accent"
                class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="warning" class="font-medium text-[var(--color-light-100)]">Warning Color</label>
            <input type="color" id="warning" wire:model.live="colors.warning"
                class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="success" class="font-medium text-[var(--color-light-100)]">Success Color</label>
            <input type="color" id="success" wire:model.live="colors.success"
                class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="highlight" class="font-medium text-[var(--color-light-100)]">Danger Color</label>
            <input type="color" id="highlight" wire:model.live="colors.highlight"
                class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="dark" class="font-medium text-[var(--color-light-100)]">Dark Color</label>
            <input type="color" id="dark" wire:model.live="colors.dark"
                class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="neutral" class="font-medium text-[var(--color-light-100)]">Neutral Color</label>
            <input type="color" id="neutral" wire:model.live="colors.neutral"
                class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
        <div class="color-picker flex flex-col gap-2">
            <label for="light" class="font-medium text-[var(--color-light-100)]">Text Color</label>
            <input type="color" id="light" wire:model.live="colors.light"
                class="w-full h-10 p-0 border border-gray-300 rounded cursor-pointer">
        </div>
    </div>
    <form class="flex flex-col gap-2" wire:submit.prevent="save" class="mt-5" method="POST">
        @csrf

        <input type="hidden" name="colors" wire:model="colors">
        <div class="max-w-sm space-y-3">
            <input type="text" wire:model="themename"
                class="py-2.5 sm:py-3 px-4 bg-color-light-100 block w-full border-[var(--color-primary-200)] rounded-lg sm:text-sm focus:border-[var(--color-primary-300)] focus:ring-[var(--color-primary-200)] disabled:opacity-50 disabled:pointer-events-none "
                placeholder="Theme Name">
        </div>
        <button type="submit"
            class="px-5 py-2.5 border-none rounded font-medium bg-color-primary-200 text-color-light-100 cursor-pointer">Save
            Colors</button>
    </form>

    <livewire:themes.theme-editor-preview :colors="$colors" :color-shadows="$colorShadows" />


</div>
