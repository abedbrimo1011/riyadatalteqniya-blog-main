@extends('layouts.app')

@section('title', 'تعديل مقال')

@section('content')
<h2>تعديل مقال</h2>

<form action="{{ route('articles.update', $article) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">العنوان</label>
        <input type="text" name="title" id="title" class="form-control"
               value="{{ old('title', $article->title) }}" required>
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">المحتوى</label>
        <textarea name="body" id="body" rows="5" class="form-control" required>{{ old('body', $article->body) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">التصنيف</label>
        <select name="category_id" id="category_id" class="form-select" required>
            <option value="">-- اختر تصنيف --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                        {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="author_id" class="form-label">المؤلف</label>
        <select name="author_id" id="author_id" class="form-select" required>
            <option value="">-- اختر مؤلف --</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}"
                    {{ old('author_id', $article->author_id) == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">تحديث</button>
</form>
@endsection
