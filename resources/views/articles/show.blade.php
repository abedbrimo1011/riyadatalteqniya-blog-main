@extends('layouts.app')

@section('title', 'عرض مقال')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>{{ $article->title }}</h4>
    </div>
    <div class="card-body">

        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="صورة المقال" class="img-fluid mb-3" style="max-height: 400px;">
        @endif

        <p><strong>التصنيف:</strong> {{ $article->category->name ?? 'غير محدد' }}</p>
        <p><strong>الكاتب:</strong> {{ $article->user->name ?? 'غير معروف' }}</p>

        <hr>

        <p>{{ $article->body }}</p>

        @if($article->owner_bio)
            <div class="mt-4 p-3 bg-light border rounded">
                <h5>نبذة عن المؤلف:</h5>
                <p>{{ $article->owner_bio }}</p>
            </div>
        @endif

    </div>
    <div class="card-footer text-muted">
        <small>تاريخ الإنشاء: {{ $article->created_at->format('Y-m-d H:i') }}</small>
    </div>
</div>

<a href="{{ route('articles.index') }}" class="btn btn-secondary mt-3">الرجوع إلى القائمة</a>
@endsection
