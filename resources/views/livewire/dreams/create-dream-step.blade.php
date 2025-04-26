<form wire:submit="store" enctype="multipart/form-data"
    class="w-full   shadow-2xl p-6 rounded-2xl bg-[var(--color-dark-200)]">
    @csrf
    <div class="text-center text-color-light-200 text-4xl text-bload p-2 m-4 mb-8 ">
        {{-- title --}}
    </div>

    <x-widgets.forms.input label="الوصف" id="description" wire:model='description' />
   
    <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
        x-on:livewire-upload-error="uploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">
        <x-widgets.forms.input label="صورة او فدبو للحلم" id="media" type="file" wire:model='media' multiple />
         <!-- Progress Bar -->
         <div x-show="uploading">
            <progress max="100" x-bind:value="progress"></progress>
        </div>
    </div>

    <div class="flex mt-4">
        <x-widgets.buttons.primary style="full" type="submit">
            حفظ
        </x-widgets.buttons.primary>
    </div>
</form>
