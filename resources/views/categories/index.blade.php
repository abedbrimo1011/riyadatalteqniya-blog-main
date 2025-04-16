@extends('layouts.app')

@section('content')
<div class="container">
    <h2>كل التصنيفات</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">إضافة تصنيف</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
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
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                    </form>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-info">عرض</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
