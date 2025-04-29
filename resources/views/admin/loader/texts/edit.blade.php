<x-layouts.admin>
    <x-slot:title> Admin Page </x-slot:title>

    <form action="{{ route('admin.loader.text.update',  ['id' => $id])  }}" method="POST"
        class="w-full   shadow-2xl p-6 rounded-2xl bg-[var(--color-dark-200)]">
        @method('PUT')
        @csrf
        <div class="text-center text-color-light-200 text-4xl text-bload p-2 m-4 mb-8 ">
            تعديل نص اللودر
        </div>

        <x-widgets.forms.input label="النص" id="text" value="{{  $text }}" />

        <div class="flex">
            <input type="checkbox"
                class="shrink-0 mt-0.5 border-gray-200 rounded-sm text-blue-600 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                id="is_active" name="is_active"   {{ $is_active  ? 'checked' : ' '}}>
            <label for="is_active" class="text-sm text-gray-500 ms-3">مفعل </label>
        </div>

        <div class="flex mt-4">
            <x-widgets.buttons.primary style="full" type="submit">
                حفظ
            </x-widgets.buttons.primary>
        </div>
    </form>
</x-layouts.admin>
