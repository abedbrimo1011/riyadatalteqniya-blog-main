@extends('layouts.app')

@section('title', 'عرض مقال')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>{{ $article->title }}</h4>
    </div>
    <div class="card-body">
        <p><strong>التصنيف:</strong> {{ $article->category->name ?? 'غير محدد' }}</p>
        <p><strong>المؤلف:</strong> {{ $article->author->name ?? 'غير معروف' }}</p>
        <hr>
        <p>{{ $article->body }}</p>
    </div>
    <div class="card-footer text-muted">
        <small>تاريخ الإنشاء: {{ $article->created_at->format('Y-m-d H:i') }}</small>
    </div>
</div>

<a href="{{ route('articles.show', $article->id) }}" class="btn btn-secondary mt-3">الرجوع إلى القائمة</a>
@endsection
