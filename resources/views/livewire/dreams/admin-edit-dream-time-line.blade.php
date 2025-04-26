<form wire:submit="update" enctype="multipart/form-data"
    class="w-full   shadow-2xl p-6 rounded-2xl bg-[var(--color-dark-200)]">
    @csrf
    <div class="text-center text-color-light-200 text-4xl text-bload p-2 m-4 mb-8 ">
        تعديل
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

    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mt-4">
        @forelse ($saved_media as  $item)
        <div
        class="relative inline-flex items-center gap-x-1.5 py-1.5 ps-3 pe-2 font-medium  text-red-800 hover:text-red-700">
        <button type="button" wire:click='deleteMedia({{ $item->id }})'
            class="absolute top-0 left-0 shrink-0 size-lg inline-flex items-center justify-center rounded-full focus:outline-none ">
            <span class="sr-only">Remove badge</span>
            <i class="fa fa-trash size-lg"></i>
        </button>
            @if ($item->getType() == 'image')
               
                    <img class="max-w-full h-auto object-cover rounded-s-lg" src="{{ asset('storage/' . $item->path) }}"
                        alt="step-media">
                
            @elseif ($item->getType() == 'video')
               
                    <video class="max-w-full h-auto object-cover rounded-s-lg"
                        src="{{ asset('storage/' . $item->path) }}" controls alt="step-media"></video>
             
            @endif
        </div>
        @empty
        @endforelse
    </div>
</form>
