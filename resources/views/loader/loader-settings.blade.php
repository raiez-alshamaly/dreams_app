<x-layouts.admin title="إعدادات اللودر">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">إعدادات اللودر</h1>
        </div>
        
        <div id="success-alert" class="hidden mb-4 p-4 rounded-md bg-green-100 border border-green-400 text-green-700">
            تم حفظ الإعدادات بنجاح
        </div>
        
        <!-- بطاقة إعدادات اللودر -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6">إعدادات عامة</h2>
            
            <div class="space-y-6">
                <!-- تفعيل اللودر -->
                <div class="flex items-center">
                    <input id="is_enabled" type="checkbox" name="is_enabled" value="1" class="h-4 w-4 text-blue-600 border-gray-300 dark:border-gray-600 focus:ring-blue-500" {{ $settings->is_enabled ? 'checked' : '' }}>
                    <label for="is_enabled" class="mr-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        تفعيل اللودر
                    </label>
                </div>
                
                <!-- وقت عرض اللودر -->
                <div>
                    <label for="display_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">وقت عرض اللودر (بالميلي ثانية)</label>
                    <input type="number" id="display_time" name="display_time" value="{{ $settings->display_time }}" min="1000" step="500" 
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                </div>
                
                <!-- لون خلفية اللودر -->
                <div>
                    <label for="background_color" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">لون خلفية اللودر</label>
                    <div class="flex">
                        <input type="color" id="background_color" name="background_color" value="{{ $settings->background_color }}" 
                            class="h-10 w-16 border-gray-300 dark:border-gray-600 rounded-l-md shadow-sm">
                        <input type="text" id="background_color_text" value="{{ $settings->background_color }}" 
                            class="flex-1 h-10 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-r-md shadow-sm">
                    </div>
                </div>
                
                <!-- لون النص -->
                <div>
                    <label for="text_color" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">لون النص</label>
                    <div class="flex">
                        <input type="color" id="text_color" name="text_color" value="{{ $settings->text_color }}" 
                            class="h-10 w-16 border-gray-300 dark:border-gray-600 rounded-l-md shadow-sm">
                        <input type="text" id="text_color_text" value="{{ $settings->text_color }}" 
                            class="flex-1 h-10 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-r-md shadow-sm">
                    </div>
                </div>
                
                <!-- نوع الأنيميشن -->
                <div>
                    <label for="animation_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">نوع الأنيميشن</label>
                    <select id="animation_type" name="animation_type" 
                        class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                        <option value="fade" {{ $settings->animation_type == 'fade' ? 'selected' : '' }}>تلاشي</option>
                        <option value="slide" {{ $settings->animation_type == 'slide' ? 'selected' : '' }}>انزلاق</option>
                        <option value="bounce" {{ $settings->animation_type == 'bounce' ? 'selected' : '' }}>ارتداد</option>
                        <option value="pulse" {{ $settings->animation_type == 'pulse' ? 'selected' : '' }}>نبض</option>
                        <option value="typewriter" {{ $settings->animation_type == 'typewriter' ? 'selected' : '' }}>كاتب</option>
                    </select>
                </div>
                
                <!-- نوع الصورة -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">نوع الخلفية</label>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input id="image_type_none" type="radio" name="image_type" value="none" class="h-4 w-4 text-blue-600 border-gray-300 dark:border-gray-600 focus:ring-blue-500" {{ $settings->image_type == 'none' ? 'checked' : '' }}>
                            <label for="image_type_none" class="mr-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                بدون صورة
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="image_type_image" type="radio" name="image_type" value="image" class="h-4 w-4 text-blue-600 border-gray-300 dark:border-gray-600 focus:ring-blue-500" {{ $settings->image_type == 'image' ? 'checked' : '' }}>
                            <label for="image_type_image" class="mr-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                صورة
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="image_type_video" type="radio" name="image_type" value="video" class="h-4 w-4 text-blue-600 border-gray-300 dark:border-gray-600 focus:ring-blue-500" {{ $settings->image_type == 'video' ? 'checked' : '' }}>
                            <label for="image_type_video" class="mr-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                فيديو
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- رفع صورة -->
                <div id="image_upload_section" class="{{ $settings->image_type != 'image' ? 'hidden' : '' }}">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">رفع صورة</label>
                    <div class="flex items-center space-x-4 space-x-reverse">
                        @if ($settings->image_path)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $settings->image_path) }}" alt="صورة اللودر" class="h-20 w-auto border border-gray-300 dark:border-gray-600 rounded-md">
                            </div>
                        @endif
                        <div class="flex-1">
                            <input type="file" id="image_upload" name="image_upload" accept="image/*" 
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                        </div>
                    </div>
                </div>
                
                <!-- رفع فيديو -->
                <div id="video_upload_section" class="{{ $settings->image_type != 'video' ? 'hidden' : '' }}">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">رفع فيديو</label>
                    <div class="flex items-center space-x-4 space-x-reverse">
                        @if ($settings->video_path)
                            <div class="mb-2">
                                <video src="{{ asset('storage/' . $settings->video_path) }}" class="h-20 w-auto border border-gray-300 dark:border-gray-600 rounded-md"></video>
                            </div>
                        @endif
                        <div class="flex-1">
                            <input type="file" id="video_upload" name="video_upload" accept="video/*" 
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                        </div>
                    </div>
                </div>
                
                <!-- تفعيل النص العشوائي -->
                <div class="flex items-center">
                    <input id="is_random_text" type="checkbox" name="is_random_text" value="1" class="h-4 w-4 text-blue-600 border-gray-300 dark:border-gray-600 focus:ring-blue-500" {{ $settings->is_random_text ? 'checked' : '' }}>
                    <label for="is_random_text" class="mr-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        عرض نص عشوائي
                    </label>
                </div>
                
                <!-- النص الافتراضي -->
                <div id="default_text_section" class="{{ $settings->is_random_text ? 'hidden' : '' }}">
                    <label for="default_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">النص الافتراضي</label>
                    <input type="text" id="default_text" name="default_text" value="{{ $settings->default_text }}" 
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                </div>
            </div>
            
            <div class="mt-8 flex justify-end">
                <button type="button" id="save-settings-btn" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    حفظ الإعدادات
                </button>
            </div>
        </div>
        
        <!-- بطاقة نصوص اللودر العشوائية -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">نصوص اللودر</h2>
                <button type="button" id="add-text-btn" class="px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    إضافة نص جديد
                </button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                النص
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                الحالة
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                الإجراءات
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700" id="loader-texts-table">
                        @foreach ($texts as $text)
                            <tr data-id="{{ $text->id }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                    {{ $text->text }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $text->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $text->is_active ? 'نشط' : 'غير نشط' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <button type="button" class="edit-text-btn ml-2 text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300" data-id="{{ $text->id }}">تعديل</button>
                                    <button type="button" class="delete-text-btn text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300" data-id="{{ $text->id }}">حذف</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- نموذج إضافة/تعديل نص -->
    <div id="text-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full flex items-center justify-center">
        <div class="relative p-5 bg-white dark:bg-gray-800 w-full max-w-md m-auto rounded-md shadow-lg">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">إضافة نص جديد</h3>
                <div class="mt-2 px-7 py-3">
                    <input type="hidden" id="text-id">
                    <div class="mb-4">
                        <label for="loader-text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 text-right mb-2">النص</label>
                        <input type="text" id="loader-text" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <input id="text-is-active" type="checkbox" name="text_is_active" value="1" class="h-4 w-4 text-blue-600 border-gray-300 dark:border-gray-600 focus:ring-blue-500" checked>
                            <label for="text-is-active" class="mr-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                نشط
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-2">
                    <button id="cancel-text-btn" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        إلغاء
                    </button>
                    <button id="save-text-btn" class="px-4 py-2 bg-blue-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        حفظ
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- معاينة اللودر -->
    <div id="loader-preview" class="fixed inset-0 hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="text-center">
                <div id="loader-preview-content">
                    <!-- سيتم تحميل محتوى اللودر هنا -->
                </div>
                <div id="loader-preview-text" class="mt-4 text-xl">
                    <!-- سيتم تحميل النص هنا -->
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // تبديل عرض قسم رفع الصورة/الفيديو
            const imageTypeRadios = document.querySelectorAll('input[name="image_type"]');
            const imageUploadSection = document.getElementById('image_upload_section');
            const videoUploadSection = document.getElementById('video_upload_section');
            
            imageTypeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    imageUploadSection.classList.toggle('hidden', this.value !== 'image');
                    videoUploadSection.classList.toggle('hidden', this.value !== 'video');
                });
            });
            
            // تبديل عرض قسم النص الافتراضي
            const isRandomTextCheckbox = document.getElementById('is_random_text');
            const defaultTextSection = document.getElementById('default_text_section');
            
            isRandomTextCheckbox.addEventListener('change', function() {
                defaultTextSection.classList.toggle('hidden', this.checked);
            });
            
            // حفظ الإعدادات
            const saveSettingsBtn = document.getElementById('save-settings-btn');
            saveSettingsBtn.addEventListener('click', function() {
                // عرض حالة التحميل
                this.textContent = 'جاري الحفظ...';
                this.disabled = true;
                
                // إنشاء كائن FormData
                const formData = new FormData();
                
                // إضافة البيانات الأساسية
                formData.append('is_enabled', document.getElementById('is_enabled').checked ? 1 : 0);
                formData.append('display_time', document.getElementById('display_time').value);
                formData.append('background_color', document.getElementById('background_color').value);
                formData.append('text_color', document.getElementById('text_color').value);
                formData.append('animation_type', document.getElementById('animation_type').value);
                
                // نوع الصورة
                const imageType = document.querySelector('input[name="image_type"]:checked').value;
                formData.append('image_type', imageType);
                
                // إضافة الصورة أو الفيديو
                if (imageType === 'image') {
                    const imageFile = document.getElementById('image_upload').files[0];
                    if (imageFile) {
                        formData.append('image_upload', imageFile);
                    }
                } else if (imageType === 'video') {
                    const videoFile = document.getElementById('video_upload').files[0];
                    if (videoFile) {
                        formData.append('video_upload', videoFile);
                    }
                }
                
                // إضافة بيانات النص
                formData.append('is_random_text', document.getElementById('is_random_text').checked ? 1 : 0);
                formData.append('default_text', document.getElementById('default_text').value);
                
                // استخدام Fetch API لإرسال البيانات
                fetch('{{ route("admin.loader.update") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('فشل في حفظ الإعدادات');
                    }
                    return response.json();
                })
                .then(result => {
                    console.log('نتيجة الحفظ:', result);
                    
                    // إظهار رسالة النجاح
                    const successAlert = document.getElementById('success-alert');
                    successAlert.textContent = result.message || 'تم تحديث الإعدادات بنجاح';
                    successAlert.classList.remove('hidden');
                    setTimeout(() => {
                        successAlert.classList.add('hidden');
                    }, 3000);
                    
                    // تغيير حالة الزر
                    saveSettingsBtn.classList.add('bg-green-500');
                    saveSettingsBtn.classList.remove('bg-blue-600');
                    saveSettingsBtn.textContent = 'تم الحفظ!';
                    saveSettingsBtn.disabled = false;
                    
                    // إعادة الزر للحالة الطبيعية بعد ثانيتين
                    setTimeout(() => {
                        saveSettingsBtn.classList.add('bg-blue-600');
                        saveSettingsBtn.classList.remove('bg-green-500');
                        saveSettingsBtn.textContent = 'حفظ الإعدادات';
                    }, 2000);
                })
                .catch(error => {
                    console.error('خطأ في حفظ الإعدادات:', error);
                    
                    // إظهار رسالة الخطأ
                    const successAlert = document.getElementById('success-alert');
                    successAlert.textContent = 'حدث خطأ أثناء حفظ الإعدادات';
                    successAlert.classList.remove('bg-green-100', 'border-green-400', 'text-green-700');
                    successAlert.classList.add('bg-red-100', 'border-red-400', 'text-red-700');
                    successAlert.classList.remove('hidden');
                    setTimeout(() => {
                        successAlert.classList.add('hidden');
                        successAlert.classList.remove('bg-red-100', 'border-red-400', 'text-red-700');
                        successAlert.classList.add('bg-green-100', 'border-green-400', 'text-green-700');
                    }, 3000);
                    
                    // إعادة الزر للحالة الطبيعية
                    saveSettingsBtn.classList.remove('bg-green-500');
                    saveSettingsBtn.classList.add('bg-blue-600');
                    saveSettingsBtn.textContent = 'حفظ الإعدادات';
                    saveSettingsBtn.disabled = false;
                });
            });
            
            // التعامل مع نموذج النص
            const textModal = document.getElementById('text-modal');
            const addTextBtn = document.getElementById('add-text-btn');
            const cancelTextBtn = document.getElementById('cancel-text-btn');
            const saveTextBtn = document.getElementById('save-text-btn');
            const modalTitle = document.getElementById('modal-title');
            
            function openTextModal(isEdit = false, textData = null) {
                modalTitle.textContent = isEdit ? 'تعديل النص' : 'إضافة نص جديد';
                
                if (isEdit && textData) {
                    document.getElementById('text-id').value = textData.id;
                    document.getElementById('loader-text').value = textData.text;
                    document.getElementById('text-is-active').checked = textData.is_active;
                } else {
                    document.getElementById('text-id').value = '';
                    document.getElementById('loader-text').value = '';
                    document.getElementById('text-is-active').checked = true;
                }
                
                textModal.classList.remove('hidden');
            }
            
            function closeTextModal() {
                textModal.classList.add('hidden');
            }
            
            // إضافة نص جديد
            addTextBtn.addEventListener('click', function() {
                openTextModal(false);
            });
            
            // تعديل نص
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('edit-text-btn')) {
                    const textId = e.target.getAttribute('data-id');
                    
                    // استعلام عن بيانات النص من الخادم
                    fetch(`{{ url('admin/loader-texts') }}/${textId}`, {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        openTextModal(true, data);
                    })
                    .catch(error => {
                        console.error('خطأ في استرجاع بيانات النص:', error);
                    });
                }
            });
            
            // حذف نص
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('delete-text-btn')) {
                    if (confirm('هل أنت متأكد من حذف هذا النص؟')) {
                        const textId = e.target.getAttribute('data-id');
                        
                        fetch(`{{ url('admin/loader-texts') }}/${textId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // حذف الصف من الجدول
                                const row = document.querySelector(`tr[data-id="${textId}"]`);
                                if (row) {
                                    row.remove();
                                }
                                
                                // إظهار رسالة النجاح
                                const successAlert = document.getElementById('success-alert');
                                successAlert.textContent = data.message || 'تم حذف النص بنجاح';
                                successAlert.classList.remove('hidden');
                                setTimeout(() => {
                                    successAlert.classList.add('hidden');
                                }, 3000);
                            }
                        })
                        .catch(error => {
                            console.error('خطأ في حذف النص:', error);
                        });
                    }
                }
            });
            
            // إلغاء النموذج
            cancelTextBtn.addEventListener('click', closeTextModal);
            
            // حفظ النص
            saveTextBtn.addEventListener('click', function() {
                const textId = document.getElementById('text-id').value;
                const text = document.getElementById('loader-text').value;
                const isActive = document.getElementById('text-is-active').checked ? 1 : 0;
                
                if (!text.trim()) {
                    alert('الرجاء إدخال النص');
                    return;
                }
                
                const formData = new FormData();
                formData.append('text', text);
                formData.append('is_active', isActive);
                
                const url = textId 
                    ? `{{ url('admin/loader-texts') }}/${textId}` 
                    : '{{ route("admin.loader.text.store") }}';
                    
                const method = textId ? 'PUT' : 'POST';
                
                fetch(url, {
                    method: method,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closeTextModal();
                        
                        // إعادة تحميل الصفحة لتحديث البيانات
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('خطأ في حفظ النص:', error);
                });
            });
            
            // معاينة اللودر
            document.getElementById('animation_type').addEventListener('change', updateLoaderPreview);
            document.getElementById('background_color').addEventListener('change', updateLoaderPreview);
            document.getElementById('text_color').addEventListener('change', updateLoaderPreview);
            
            function updateLoaderPreview() {
                const animationType = document.getElementById('animation_type').value;
                const backgroundColor = document.getElementById('background_color').value;
                const textColor = document.getElementById('text_color').value;
                
                // تحديث المعاينة
                const loaderPreview = document.getElementById('loader-preview');
                loaderPreview.style.backgroundColor = backgroundColor;
                
                const loaderPreviewText = document.getElementById('loader-preview-text');
                loaderPreviewText.style.color = textColor;
                
                // إضافة الفئة المناسبة للأنيميشن
                loaderPreviewText.className = '';
                loaderPreviewText.classList.add(`animation-${animationType}`);
            }
        });
    </script>
</x-layouts.admin> 