@extends('layouts.app')

@section('title', 'إضافة مقال')

@section('content')
<h2>إضافة مقال جديد</h2>

<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">العنوان</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">المحتوى</label>
        <textarea name="body" id="body" rows="5" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">التصنيف</label>
        <select name="category_id" id="category_id" class="form-select" required>
            <option value="">-- اختر تصنيف --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- صورة المقال --}}
    <div class="mb-3">
        <label for="image" class="form-label">صورة المقال (اختياري)</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

    {{-- نبذة عن المؤلف --}}
    <div class="mb-3">
        <label for="owner_bio" class="form-label">نبذة عن المؤلف (اختياري)</label>
        <textarea name="owner_bio" id="owner_bio" rows="3" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary">حفظ المقال</button>
</form>
@endsection
