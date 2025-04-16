@include('layouts.header')


    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">لوحة التحكم</h1>

        {{-- عرض تنبيهات --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- نموذج تحديد مبلغ عشوائي --}}
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-lg font-semibold mb-4">اختيار حلم عشوائي للتحقيق</h2>
            <form method="POST" action="{{ url('/admin/fulfill_dream') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="minAmount">الحد الأدنى (ل.س)</label>
                        <input type="number" name="minAmount" id="minAmount" class="form-control"
                            value="{{ old('minAmount') }}">
                    </div>
                    <div>
                        <label for="maxAmount">الحد الأقصى (ل.س)</label>
                        <input type="number" name="maxAmount" id="maxAmount" class="form-control"
                            value="{{ old('maxAmount') }}">
                    </div>
                </div>
                <div class="flex gap-4 mt-4">
                    <button type="submit" name="select_random" class="btn btn-primary">اختيار عشوائي</button>
                    <button type="submit" name="view_dreams" class="btn btn-secondary">عرض المطابق</button>
                </div>
            </form>
        </div>

        <livewire:data-table.dream-table>
        {{-- عرض الأحلام --}}
        {{-- <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">إدارة جميع الأحلام</h2>
            @if($dreams->isEmpty())
                <p class="text-center">لا توجد أحلام للعرض.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>الوصف</th>
                                <th>المبلغ</th>
                                <th>الحالة</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dreams as $index => $dream)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $dream->full_name }}</td>
                                    <td>{{ $dream->description }}</td>
                                    <td>{{ $dream->amount }} ل.س</td>
                                    <td>
                                        @if($dream->status === \App\Enums\DreamStatusEnum::APPROVE->value)
                                            <span class="badge bg-success">تم التحقيق</span>
                                        @else
                                            <span class="badge bg-warning text-dark">معلق</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($dream->status === \App\Enums\DreamStatusEnum::PENDING->value)
                                            <form method="POST" action="{{ url('/admin/dream/accept') }}" class="inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $dream->id }}">
                                                <button class="btn btn-sm btn-success">تحقيق</button>
                                            </form>
                                            <form method="POST" action="{{ url('/admin/dream/delete') }}" class="inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $dream->id }}">
                                                <button class="btn btn-sm btn-danger">حذف</button>
                                            </form>
                                        @else
                                            <span class="text-muted">تم تحقيقه</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div> --}}
    </div>
