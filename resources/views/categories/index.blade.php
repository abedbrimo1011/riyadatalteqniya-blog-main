@extends('layouts.app')

@section('content')
<div class="container">
    <h2>كل التصنيفات</h2>
  

    <!-- زر إضافة تصنيف جديد -->
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">إضافة تصنيف</a>

    <!-- عرض رسالة النجاح بعد إضافة أو تعديل تصنيف -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- التحقق من وجود تصنيفات -->
    @if($categories->count() > 0)
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <!-- رابط تعديل التصنيف -->
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">تعديل</a>

                            <!-- نموذج الحذف -->
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">حذف</button>
                            </form>

                            <!-- رابط عرض التصنيف -->
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-info">عرض</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <!-- إذا لم تكن هناك تصنيفات -->
        <p>لا توجد تصنيفات حالياً.</p>
    @endif
</div>
@endsection
