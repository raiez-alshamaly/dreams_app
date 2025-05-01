<x-layouts.users.app has-footer="{{ false }}">


    <div class="container m-auto mx-auto px-4 py-8 ">
        <form action="{{route('dreams.store')}}" method="POST" enctype="multipart/form-data"
            class="w-full md:w-1/2 m-auto mt-6 px-8 py-8 shadow-2xl rounded-3xl  bg-[var(--color-dark-200)]">
            @csrf
            <div class="text-center text-color-light-50 text-4xl text-bload p-2 m-4 mb-8 ">مشاركة حلم جديد</div>
            <x-widgets.forms.input label="الاسم الكامل" id="full_name" />
            <x-widgets.forms.input label="الوصف" id="description" />
            <x-widgets.forms.input label="رقم الهاتف" id="phone"  type="phone"/>
            <x-widgets.forms.input label="المبلغ" id="amount"  type="number"/>
            <x-widgets.forms.input label="صورة الحلم" id="image_path"  type="file"/>
            <x-widgets.forms.input label="صورة الهوية" id="id_image_path" type="file"/>
            <div class="flex mt-4" >
                <x-widgets.buttons.primary  style="full" >
                    حفظ
                </x-widgets.buttons.primary>
            </div>
        </form>
    </div>
</x-layouts.users.app>
