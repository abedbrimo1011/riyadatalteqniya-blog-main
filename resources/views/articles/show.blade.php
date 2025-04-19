@extends('layouts.app')

@section('title', 'عرض مقال')

@section('content')
<div class="container mx-auto px-4" dir="rtl">
    <div class="bg-white shadow-lg rounded-lg p-6 mb-4">
        {{-- عنوان المقال --}}
        <div class="bg-blue-600 text-white rounded-t-lg p-4 mb-4">
            <h4 class="text-2xl font-bold">{{ $article->title }}</h4>
        </div>

        {{-- صورة المقال --}}
        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="صورة المقال" class="w-full h-auto mb-4 rounded shadow-md" style="max-height: 400px;">
        @endif

        {{-- التصنيف والكاتب --}}
        <div class="text-sm text-gray-600 mb-4">
            <p><strong>التصنيف:</strong> {{ $article->category->name ?? 'غير محدد' }}</p>
            <p><strong>الكاتب:</strong> {{ $article->author->name ?? 'غير معروف' }}</p>
        </div>

        <hr class="my-4 border-t border-gray-300">

        {{-- محتوى المقال --}}
        <p class="text-gray-700 text-lg mb-4">{{ $article->body }}</p>

        {{-- نبذة عن المؤلف --}}
        @if($article->owner_bio)
            <div class="mt-4 p-4 bg-gray-100 border rounded-lg">
                <h5 class="text-lg font-semibold text-gray-800">نبذة عن المؤلف:</h5>
                <p class="text-gray-600">{{ $article->owner_bio }}</p>
            </div>
        @endif

        {{-- تاريخ الإنشاء --}}
        <div class="mt-4 text-sm text-gray-500">
            <small>تاريخ الإنشاء: {{ $article->created_at->format('Y-m-d H:i') }}</small>
        </div>
    </div>

    {{-- الرجوع إلى القائمة --}}
    <a href="{{ route('articles.index') }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-md transition">
        الرجوع إلى القائمة
    </a>
</div>
@endsection
