@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $article->title }}</h2>

    <p><strong>المؤلف:</strong> {{ $article->author->name ?? 'غير معروف' }}</p>
    <p><strong>التصنيف:</strong> {{ $article->category->name ?? 'غير مصنف' }}</p>

    @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" width="300" class="mb-3">
    @endif

    <div class="mb-3">
        <strong>المحتوى:</strong>
        <p>{{ $article->body }}</p>
    </div>

    @if($article->author_bio)
        <div class="alert alert-secondary">
            <strong>نبذة عن المؤلف:</strong>
            <p>{{ $article->author_bio }}</p>
        </div>
    @endif

    <a href="{{ route('articles.index') }}" class="btn btn-secondary">رجوع</a>
</div>
@endsection
