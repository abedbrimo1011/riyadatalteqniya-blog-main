@extends('layouts.app')

@section('title', 'تعديل مقال')

@section('content')
<div class="container mx-auto px-4" dir="rtl">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">تعديل مقال</h2>

    <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        {{-- العنوان --}}
        <div class="mb-4">
            <label for="title" class="block text-gray-700 mb-2">العنوان</label>
            <input type="text" name="title" id="title" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                   value="{{ old('title', $article->title) }}" required>
        </div>

        {{-- المحتوى --}}
        <div class="mb-4">
            <label for="body" class="block text-gray-700 mb-2">المحتوى</label>
            <textarea name="body" id="body" rows="5" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" required>{{ old('body', $article->body) }}</textarea>
        </div>

        {{-- التصنيف --}}
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 mb-2">التصنيف</label>
            <select name="category_id" id="category_id" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
                <option value="">-- اختر تصنيف --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- المؤلف --}}
        <div class="mb-4">
            <label for="author_id" class="block text-gray-700 mb-2">المؤلف</label>
            <select name="author_id" id="author_id" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
                <option value="">-- اختر مؤلف --</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" 
                        {{ old('author_id', $article->author_id) == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- صورة المقال --}}
        <div class="mb-4">
            <label for="image" class="block text-gray-700 mb-2">صورة المقال الحالية</label>
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="صورة المقال" class="rounded shadow mb-2" style="max-height: 150px;">
            @else
                <p class="text-sm text-gray-500">لا توجد صورة حالية</p>
            @endif
            <input type="file" name="image" id="image" class="w-full border rounded px-4 py-2 mt-2">
        </div>

        {{-- نبذة عن المؤلف --}}
        <div class="mb-6">
            <label for="owner_bio" class="block text-gray-700 mb-2">نبذة عن المؤلف</label>
            <textarea name="owner_bio" id="owner_bio" rows="3" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('owner_bio', $article->owner_bio) }}</textarea>
        </div>

        {{-- زر الحفظ --}}
        <div class="text-left">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded transition">
                حفظ التعديلات
            </button>
        </div>
    </form>
</div>
@endsection
