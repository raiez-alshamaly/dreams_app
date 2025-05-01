<div class="container mx-auto px-4 py-8">
   

    <div id="success-alert" class="hidden mb-4 p-4 rounded-md bg-green-100 border border-green-400 text-green-700">
        تم حفظ الإعدادات بنجاح
    </div>

    <!-- بطاقة إعدادات اللودر -->
    <div class="bg-color-dark-50  rounded-lg shadow-lg border   p-6 mb-8">
        <h2 class="text-xl font-bold text-color-light-50 mb-6">إعدادات عامة</h2>

        <div class="space-y-6">
            <!-- تفعيل اللودر -->
            <div class="flex items-center">
                <div class="flex">
                    <input type="checkbox"
                        class="shrink-0 mt-0.5  rounded-sm text-color-light-50 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        id="isEnable" wire:model.defer='isEnable' value="{{ $isEnable }}"
                        @if ($isEnable > 0) checked @endif>
                    <label for="isEnable" class="text-sm text-gray-500 ms-3">مفعل </label>
                </div>



            </div>

            <x-widgets.forms.input label="وقت عرض اللودر" id="time" wire:model='time' type="number" />
            <x-widgets.forms.input label="النص الافتراضي" id="defaultText" wire:model='defaultText' />

            <x-widgets.forms.input label="لون النص " id="textcolor" wire:model='textcolor' type="color"
                class=" h-15 w-24 p-0 " />
            <x-widgets.forms.input label="لون خلفية اللودر" id="bgcolor" wire:model='bgcolor' type="color"
                class=" h-15  w-24 p-0 " />







            <!-- نوع الأنيميشن -->
            <div>
                <label for="animation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">نوع
                    الأنيميشن</label>
                <select id="animation" name="animation" wire:model='animation'
                    class="w-full p-2   rounded-md shadow-sm bg-cyan-50">
                    <option value="slide">انزلاق</option>
                    <option value="fade">تلاشي</option>
                    <option value="bounce">ارتداد</option>
                    <option value="pulse">نبض</option>
                    <option value="typewriter">كاتب
                    </option>
                </select>
            </div>
            <!-- تفعيل النص العشوائي -->
            <div class="flex items-center">
                <input id="is_random_text" type="checkbox" name="is_random_text" value="1"
                    class="h-4 w-4 text-color-light-50   focus:ring-blue-500"
                    {{ $loader->is_random_text ? 'checked' : '' }}>
                <label for="is_random_text" class="mr-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                    عرض نص عشوائي
                </label>
            </div>

            <!-- نوع الصورة -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">نوع الخلفية</label>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <input id="image_type_none" type="radio" name="type" value="empty" wire:model.live='type'
                            class="h-4 w-4 text-color-light-50   bg-cyan-50 focus:ring-blue-500"
                            {{ $type == 'empty' ? 'checked' : '' }}>
                        <label for="image_type_none"
                            class="mr-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            بدون صورة
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input id="image_type_image" type="radio" name="type" value="image" wire:model.live='type'
                            class="h-4 w-4 text-color-light-50  bg-cyan-50 focus:ring-blue-500"
                            {{ $type == 'image' ? 'checked' : '' }}>
                        <label for="image_type_image"
                            class="mr-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            صورة
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input id="image_type_video" type="radio" name="type" value="video" wire:model.live='type'
                            class="h-4 w-4 text-color-light-50 bg-cyan-50  focus:ring-blue-500"
                            {{ $type == 'video' ? 'checked' : '' }}>
                        <label for="image_type_video"
                            class="mr-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            فيديو
                        </label>
                    </div>
                </div>
            </div>
            <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                <x-widgets.forms.input label="صورة او فدبو للحلم" id="media" type="file" wire:model='media'
                     />
                <!-- Progress Bar -->
                <div x-show="uploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mt-4">
                @if ($savedMedia)
                <div
                class="relative inline-flex items-center gap-x-1.5 py-1.5 ps-3 pe-2 font-medium  text-red-800 hover:text-red-700">
                <button type="button" wire:click='deleteMedia({{ $savedMedia->id }})'
                    class="absolute top-0 left-0 shrink-0 size-lg inline-flex items-center justify-center rounded-full focus:outline-none ">
                    <span class="sr-only">Remove badge</span>
                    <i class="fa fa-trash size-lg"></i>
                </button>
                    @if ($savedMedia->getType() == 'image')
                       
                            <img class="max-w-full h-auto object-cover rounded-s-lg" src="{{ asset('storage/' . $savedMedia->path) }}"
                                alt="step-media">
                        
                    @elseif ($savedMedia->getType() == 'video')
                       
                            <video class="max-w-full h-auto object-cover rounded-s-lg"
                                src="{{ asset('storage/' . $savedMedia->path) }}" controls alt="step-media"></video>
                     
                    @endif
                </div>
                @else
                @endif
            </div>


        </div>

        <div class="mt-8 flex justify-end">
            <button type="button" id="save-loader-btn" wire:click='save'
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                حفظ الإعدادات
            </button>
        </div>

          <!-- بطاقة نصوص اللودر العشوائية -->
    <div class="mt-6  p-4">
        <div class="flex justify-between items-center mb-2">
            <h2 class="text-xl font-bold text-color-light-50">نصوص اللودر</h2>
            <a href= "{{ route('admin.loader.text.create') }}"
                class="px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                إضافة نص جديد

            </a>
        </div>
        <livewire:data-table.loader-text-table>

    </div>
    </div>

  
</div>
