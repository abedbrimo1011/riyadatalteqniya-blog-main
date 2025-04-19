@extends('layouts.app')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-xl font-bold mb-4">كل التصنيفات</h2>

    <!-- زر إضافة تصنيف جديد -->
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
        إضافة تصنيف جديد
    </a>

    <!-- عرض رسالة النجاح بعد إضافة أو تعديل تصنيف -->
    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- التحقق من وجود تصنيفات -->
    @if($categories->count() > 0)
        <div class="overflow-x-auto">
            <table class="table table-bordered align-middle text-right">
                <thead>
                    <tr>
                        <th class="text-center">الاسم</th>
                        <th class="text-center">الوصف</th>
                        <th class="text-center">التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="text-center">{{ $category->name }}</td>
                            <td class="text-center">{{ $category->description }}</td>
                            <td class="text-center">
                                <!-- رابط تعديل التصنيف -->
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning mb-1">تعديل</a>

                                <!-- نموذج الحذف -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger mb-1">حذف</button>
                                </form>

                                <!-- رابط عرض التصنيف -->
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-info">عرض</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <!-- إذا لم تكن هناك تصنيفات -->
        <p class="text-center mt-4">لا توجد تصنيفات حالياً.</p>
    @endif
</div>
@endsection
