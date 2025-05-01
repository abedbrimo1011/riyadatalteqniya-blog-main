@extends('layouts.app')

@section('content')
<div class="container">
    <h1>بيانات المؤلف</h1>

    <div class="mb-3">
        <strong>الاسم:</strong> {{ $author->name }}
    </div>

    <div class="mb-3">
        <strong>البريد الإلكتروني:</strong> {{ $author->email }}
    </div>

    <div class="mb-3">
        <strong>النبذة:</strong> {{ $author->bio ?? '—' }}
    </div>

    <hr>

    <h3>المقالات</h3>
    <ul>
        @forelse($author->articles as $article)
            <li>{{ $article->title }}</li>
        @empty
            <li>لا توجد مقالات بعد.</li>
        @endforelse
    </ul>

    <a href="{{ route('authors.index') }}" class="btn btn-secondary mt-3">رجوع</a>
</div>
@endsection
