@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4 rounded-4 w-75">
        <h2 class="text-center mb-4 text-primary">📝 إنشاء مقال جديد</h2>

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="form-label fw-bold">عنوان المقال</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="mb-4">
                <label for="body" class="form-label fw-bold">المحتوى</label>
                <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="category_id" class="form-label fw-bold">التصنيف</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">

            <div class="mb-4">
                <label for="author_bio" class="form-label fw-bold">نبذة عن المؤلف</label>
                <textarea name="author_bio" id="author_bio" class="form-control" rows="3">{{ old('author_bio') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="form-label fw-bold">صورة</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">
                    <i class="bi bi-save"></i> حفظ
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
