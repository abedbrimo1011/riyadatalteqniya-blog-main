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

<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>الصورة</th>
            <th>العنوان</th>
            <th>التصنيف</th>
            <th>النبذة</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @forelse($articles as $article)
            <tr>
                <td style="width: 120px;">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="صورة" class="img-thumbnail" style="max-height: 100px;">
                    @else
                        <span class="text-muted">لا توجد صورة</span>
                    @endif
                </td>
                <td>
                    <strong>{{ $article->title }}</strong><br>
                    <small class="text-muted">بواسطة: {{ $article->user->name ?? 'غير معروف' }}</small>
                </td>
                <td>{{ $article->category->name ?? '-' }}</td>
                <td style="max-width: 300px;">
                    @if($article->owner_bio)
                        <small>{{ Str::limit($article->owner_bio, 100) }}</small>
                    @else
                        <span class="text-muted">لا توجد نبذة</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-warning mb-1">تعديل</a>
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">حذف</button>
                    </form>
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-info mt-1">عرض</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">لا توجد مقالات</td>
            </tr>
        @endforelse
    </tbody>
</table>

@if ($articles->hasPages())
    <div class="flex flex-col items-center mt-6 space-y-2">
        @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)
            @if ($page == $articles->currentPage())
                <span class="px-4 py-2 bg-blue-600 text-white rounded">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    {{ $page }}
                </a>
            @endif
        @endforeach
    </div>
@endif


@endsection
