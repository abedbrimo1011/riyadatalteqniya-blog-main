@extends('layouts.app')

@section('content')
<div class="container">
    <h1>قائمة المؤلفين</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">إضافة مؤلف</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
            <tr>
                <td>{{ $author->name }}</td>
                <td>{{ $author->email }}</td>
                <td>
                    <a href="{{ route('authors.show', $author) }}" class="btn btn-info btn-sm">عرض</a>
                    <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
