@extends('layouts.app')

@section('title', 'كل المقالات')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>المقالات</h2>
    <a href="{{ route('articles.create') }}" class="btn btn-primary">إضافة مقال</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>العنوان</th>
            <th>التصنيف</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @forelse($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->category->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-warning">تعديل</a>
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">لا توجد مقالات</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
