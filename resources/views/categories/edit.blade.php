@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل التصنيف</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $category->description }}</textarea>
        </div>

        <button class="btn btn-primary">تحديث</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>
@endsection
