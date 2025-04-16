@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل التصنيف</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>الاسم</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label>الوصف</label>
            <textarea name="description" class="form-control">{{ $category->description }}</textarea>
        </div>

        <button class="btn btn-primary">تحديث</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>
@endsection
