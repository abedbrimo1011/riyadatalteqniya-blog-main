@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل المقال: {{ $article->title }}</h2>

    <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">عنوان المقال</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">المحتوى</label>
            <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $article->body) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">التصنيف</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">


        <div class="mb-3">
            <label for="author_bio" class="form-label">نبذة عن المؤلف</label>
            <textarea name="author_bio" id="author_bio" class="form-control" rows="3">{{ old('author_bio', $article->author_bio) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">صورة</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="صورة المقال" width="150" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection
