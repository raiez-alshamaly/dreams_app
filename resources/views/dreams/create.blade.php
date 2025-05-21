<x-layouts.users.app has-footer="{{ false }}">
    

    <!-- خلفية متحركة -->
    <div
        class="fixed inset-0 -z-10 bg-[linear-gradient(to_right,var(--color-secondary-600),var(--color-primary-400))] overflow-hidden">
    </div>

    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <form action="{{ route('dreams.store') }}" method="POST" enctype="multipart/form-data"
            class="fade-card w-full md:w-1/2 bg-[var(--color-dark-200)] rounded-2xl shadow-2xl px-10 py-10 space-y-6">
            @csrf
            <div class="text-center text-color-light-50 text-3xl font-semibold fade-item">شارك حلمك</div>

            <div class="fade-item"><x-widgets.forms.input label="الاسم الكامل" id="full_name" /></div>
            <div class="fade-item"><x-widgets.forms.input label="الوصف" id="description" /></div>
            <div class="fade-item"><x-widgets.forms.input label="رقم الهاتف" id="phone" type="phone" /></div>
            <div class="fade-item"><x-widgets.forms.input label="المبلغ" id="amount" type="number" /></div>
            <div class="fade-item"><x-widgets.forms.input label="صورة الحلم" id="image_path" type="file" /></div>
            <div class="fade-item"><x-widgets.forms.input label="صورة الهوية" id="id_image_path" type="file" /></div>

            <div class="fade-item flex justify-center">
                <x-widgets.buttons.primary style="full" class="btn-glow">
                    إرسال الحلم
                </x-widgets.buttons.primary>
            </div>
        </form>
    </div>
</x-layouts.users.app>