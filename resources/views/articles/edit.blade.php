@extends('layouts.app')

@section('title', 'تعديل مقال')

@section('content')
<h2>تعديل مقال</h2>

<form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
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
        <label for="image" class="form-label">صورة المقال الحالية</label><br>
        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="صورة المقال" style="max-height: 150px;">
        @else
            <p>لا توجد صورة حالية</p>
        @endif
        <input type="file" name="image" id="image" class="form-control mt-2">
    </div>

    <div class="mb-3">
        <label for="owner_bio" class="form-label">نبذة عن المؤلف</label>
        <textarea name="owner_bio" id="owner_bio" rows="3" class="form-control">{{ old('owner_bio', $article->owner_bio) }}</textarea>
    </div>

    <button class="btn btn-success">تحديث</button>
</form>
@endsection
